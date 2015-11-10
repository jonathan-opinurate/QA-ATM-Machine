<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 16:22
 */

namespace AppBundle\Controller;


use AppBundle\Entity\AtmMachine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OptionController extends Controller
{

    public function selectionAction()
    {
        return $this->render('AppBundle:Machine:options.html.php');
    }
}