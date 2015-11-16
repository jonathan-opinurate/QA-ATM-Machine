<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 14:39
 */

namespace AppBundle\Controller;


use AppBundle\Entity\AccountHolder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class FormBuildController extends Controller
{
    /**
     * @Route("/cash-out/{receipt}", name="cash_out")
     */
    public function withdrawalFormAction(Request $request, $receipt)
    {
        $form = $this->createFormBuilder()
            ->add('amount', 'choice', [
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    10 => "£10",
                    20 => "£20",
                    30 => "£30",
                    40 => "£40",
                    50 => "£50",
                    100 => "£100",
                    150 => "£150",
                    250 => "£250",
                    null => 'Input own amount',
                ]
            ])
            ->add('receipt', 'hidden', [
                'data' => $receipt
            ])
            ->add('altAmount', 'text', [
                'required' => false
            ])
            ->add('withdraw', 'submit', array('label' => 'Withdraw'))
            ->getForm();

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();

                $amount = $data['amount'];
                $altAmount = $data['altAmount'];
                $showReceipt = (int)$data['receipt'] === 1;

                $user = $this->getUser();
                $accountNumber = $user->getAccNo();
                $balance = $user->getBalance();
                $limit = 250;

                if ($altAmount !== null && $altAmount < $limit){
                    $newBalance = $balance - $altAmount;
                }elseif ($amount >0 && $amount < ($limit + 1 )){
                    $newBalance = $balance - $amount;
                }else{
                    return $this->render('AppBundle:Machine:error-amount.html.php');
                }

                $this->withdraw($accountNumber, $altAmount !== null ? $altAmount : $amount);


                if ($showReceipt) {
                    return $this->redirectToRoute('receipt', [
                        'amount' => $amount
                    ]);
                } else {
                    return $this->redirectToRoute('show_balance');
                }
            }
        }

        return $this->render('AppBundle:Machine:cashout.html.php', [
            'form' => $form->createView()
        ]);
    }

    public function withdraw($accountNumber, $amount)
    {
        $repo = $this->getDoctrine()->getRepository(AccountHolder::class);
        $account = $repo->findOneBy(['acc_no' => $accountNumber]);
        $account->setBalance($account->getBalance() - $amount);
        $account->setCashOut($account->getCashOut() + $amount);

        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->flush();
    }
}

