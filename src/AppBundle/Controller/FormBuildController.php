<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 14:39
 */

namespace AppBundle\Controller;


use AppBundle\Entity\AccountHolder;
use AppBundle\Form\WithdrawalFormType;
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
        $form = $this->createForm(new WithdrawalFormType($receipt));

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
                $remainingLimit = 250 - $user->getCashOut();

                $withdrawalAmount = $altAmount === null ? $amount : $altAmount;
                if ($withdrawalAmount <= 0 || $withdrawalAmount > $remainingLimit || ($withdrawalAmount % 10) !== 0) {
                    return $this->render('AppBundle:Machine:error-amount.html.php');
                }

                if ($balance < $withdrawalAmount) {
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

