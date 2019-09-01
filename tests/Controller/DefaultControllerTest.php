<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testDefaultController()
    {
        $client = static::createClient();
        $client->request('GET', '/users');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/invites');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}