<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 10/11/15
 * Time: 10:36
 */
namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    public function testLoginChecker(){

        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Bank of PHP', $crawler->filter('h1')->text());
    }
}