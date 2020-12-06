<?php

namespace ParcBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VoitureControllerTest extends WebTestCase
{
    public function testVoiture()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Voiture');
    }

}
