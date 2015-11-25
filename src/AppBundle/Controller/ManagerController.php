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

        $machineStatus = $this->get('machine.status.service');
        $machineStatus->close();

        return $this->render('AppBundle:Machine:closed.html.php');

    }

    /**
     * @Route("/open", name="open")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function openMachineAction(){
        $machineStatus = $this->get('machine.status.service');
        $machineStatus->open();

        return $this->redirectToRoute('login');
    }
}