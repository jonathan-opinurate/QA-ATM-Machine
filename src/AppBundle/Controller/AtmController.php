<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\AccountHolder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AtmController extends Controller
{
    /**
     * @return Response
     * @Route("/", name="options")
     */
    public function homeAction()
    {
        return $this->render('AppBundle:Machine:options.html.php');
    }
}