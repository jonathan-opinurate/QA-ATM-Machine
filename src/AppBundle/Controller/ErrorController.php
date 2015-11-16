<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 16/11/15
 * Time: 15:02
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends Controller
{

    /**
     * @Route("user-error", name="user_error")
     */
    public function userErrorAction()
    {
        return $this->render('AppBundle:Machine:user-error.html.php');
    }
}