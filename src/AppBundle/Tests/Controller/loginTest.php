<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 10/11/15
 * Time: 10:36
 */
namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

class LoginTest extends WebTestCase
{
    public function TestLoginChecker(){

        $client = static::createClient();

        $client = $client->request('GET', '/');

        $this->assertEquals();
    }
}