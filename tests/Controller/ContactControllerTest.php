<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 3:36 PM
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testItCreateANewContact(){

        $client = self::createClient();
        $client->request('GET','/contact');

        $formNode = $client->getCrawler()->filter('.container > form:nth-child(1)');
        self::assertCount(1,$formNode);

        $form = $formNode->form([
            'contact[name]' => 'toto',
            'contact[courriel]' => 'toto@toto.com',
            'contact[message]' => 'toto'
        ]);
        $client->followRedirect();
        $client->submit($form);

        self::assertContains("success", $client->getResponse()->getContent());
    }

    public function testItFailsCreatingAnException(){

        $client = self::createClient();
        $client->request('GET','/contact');

        $formNode = $client->getCrawler()->filter('.container > form:nth-child(1)');
        self::assertCount(1,$formNode);

        $form = $formNode->form([
            'contact[name]' => '',
            'contact[courriel]' => 'toto',
            'contact[message]' => 'totototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototototo'
        ]);

        $client->submit($form);

        self::assertContains("This value should not be blank.", $client->getResponse()->getContent());
        self::assertContains("This value is not a valid email address.", $client->getResponse()->getContent());
        self::assertContains("This value is too long. It should have 128 characters or less.", $client->getResponse()->getContent());
    }

}