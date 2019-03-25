<?php

declare(strict_types=1);

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController
{
    /**
     * @Route("/{name}", requirements={"name":"[a-zA-Z]+"})
     */
    public function index(string $name = 'world'): Response
    {
        return new Response('<html>Hello '.$name.' !</html>');
    }
}
