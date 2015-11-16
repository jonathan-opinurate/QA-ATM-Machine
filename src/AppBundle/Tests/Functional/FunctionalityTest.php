<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationAvailabilityFunctionalTest extends WebTestCase
{
    /**
    * @dataProvider urlProvider
    */
    public function testPageIsSuccessful($url)
    {
    $client = self::createClient();
    $client->request('GET', $url = '/login');

    $this->assertTrue($client->getResponse()->isSuccessful());
}

    public function urlProvider()
    {
        return array(
        array('/'),
        array('/login'),
        array('/error'),
        array('/options'),
        array('/withdraw'),
        // ...
        );
    }

}