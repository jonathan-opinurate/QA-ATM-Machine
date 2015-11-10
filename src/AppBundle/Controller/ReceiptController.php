<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 15:09
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReceiptController extends Controller
{
    /**
     * @Route("/cash-out/{amount}/", name="receipt")
     */
    public function displayReceipt($amount)
    {

        return $this->render('AppBundle:Machine:receipt.html.php', [
            'amount' => $amount
        ]);
    }
}