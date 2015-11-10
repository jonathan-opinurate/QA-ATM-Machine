<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AccountHolder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @Route("/createanna-lovegood")
     */
    public function createAction()
    {
        $account_holder = new AtmMachine();
        $account_holder->setId(6);
        $account_holder->setName('Anna Lovegood');
        $account_holder->setAccNo('100008');
        $account_holder->setPinNo(1235);
        $account_holder->setBalance(1200);

        $em = $this->get('doctrine.orm.default_entity_manager');

        $em->persist($account_holder);
        $em->flush();

        return new Response('Created account holder '.$account_holder->getName());
    }

    public function withdrawalAction()
    {
        /** @var AccountHolder $user */
        $user = $this->getUser();

        $accountNumber = $user->getAccNo();

        $this->updateBalance($accountNumber, $user->getBalance() - $amount);
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
