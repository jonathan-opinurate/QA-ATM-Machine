<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 11/11/15
 * Time: 11:54
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\AccountHolder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DepositController extends Controller
{
    /**
     * @Route("/deposit", name="deposit")
     */
    public function depositFormAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('amount', 'text', [
                'required' => true
            ])
            ->add('deposit', 'submit', array('label' => 'Deposit'))
            ->getForm();

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();

                $amount = $data['amount'];

                $user = $this->getUser();
                $accountNumber = $user->getAccNo();
                $balance = $user->getBalance();
                $limit = 250;

                if ($amount > 0){
                    $newBalance = $balance + $amount;
                }else{
                    return $this->render('AppBundle:Machine:error-amount.html.php');
                }

                $this->updateBalance($accountNumber, $newBalance);
            }
        }

        return $this->render('AppBundle:Machine:deposit-cash.html.php', [
            'form' => $form->createView()
        ]);



    }

    public function updateBalance($accountNumber, $newBalance)
    {
        $repo = $this->getDoctrine()->getRepository(AccountHolder::class);
        $account = $repo->findOneBy(['acc_no' => $accountNumber]);
        $account->setBalance($newBalance);

        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->flush();
    }
}