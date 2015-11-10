<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 16:21
 */

namespace AppBundle\Controller;
use AppBundle\Entity\AccountHolder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Request;

class ManagerController extends Controller
{
    /**
     * @Route("/closed", name="closed")
     */
    public function managerAction()
    {
        /** @var AccountHolder $user */
        $user = $this->getUser();

        $accountNumber = $user->getAccNo();
        $pinNumber = $user->getPinNo();
        if($accountNumber === 999999 && $pinNumber === 1234){
            return $this->render('AppBundle:Machine:closed.html.php');
        }else{
            return $this->render('AppBundle:Machine:closed.html.php');
        }
    }
}