<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/25/19
 * Time: 4:15 PM
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController
{
    /**
     * @Route(path="/hello/{name}", requirements={"name":"[a-zA-Z]+"}, name="app_homepage_index")
     */
    public function index(string $name = 'World'): Response
    {
        //return new Response(sprintf("Hello %s !",$name));
        return new Response("<html><body>Hello $name !</body></html>");
    }
    /**
     * @Route(path="/api")
     */
    public function json(): Response
    {
        return new JsonResponse(array("somedata"=>'foobar'));
    }

}