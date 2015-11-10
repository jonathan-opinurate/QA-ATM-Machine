<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 14:03
 */

namespace AppBundle\Controller;


use AppBundle\Entity\AccountHolder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BalanceController extends Controller
{
    /**
     * @Route("/show-balance", name="show_balance")
     */
    public function showBalanceAction()
    {
        /** @var AccountHolder $user */
        $user = $this->getUser();

        return $this->render('AppBundle:Machine:show-balance.html.php', [
            'balance' => $user->getBalance(),
            'name' => $user->getName()
        ]);
    }
}