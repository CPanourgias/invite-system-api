<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecieverControllerTest extends WebTestCase
{
    public function testRecieverController()
    {
        $client = static::createClient();

        $client->request('GET', '/reciever/1/view');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"'
        );

        $client->request('GET', '/reciever/1/accept_1');
        $this->assertTrue($client->getResponse()->isRedirect());
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"'
        );

        $client->request('GET', '/reciever/1/decline_1');
        $this->assertTrue($client->getResponse()->isRedirect());
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"'
        );
    }

}