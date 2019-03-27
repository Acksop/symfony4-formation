<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 3:36 PM
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageControllerTest extends WebTestCase
{
    public function testItGreetsTheWorld(){

        $client = self::createClient();
        $client->request('GET','/hello');

        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertContains("Hello World !", $client->getResponse()->getContent());

    }

    public function testItGreetsSomeone(){

        $client = self::createClient();
        $client->request('GET','/hello/Adrien');

        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertContains("Hello Adrien !", $client->getResponse()->getContent());

    }


}