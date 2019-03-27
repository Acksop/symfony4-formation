<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/25/19
 * Time: 5:08 PM
 */

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController
{
    /**
     * @Route("/blog/{page}", requirements={"page": "\d+"})
     */
    public function listPosts(int $page) : Response
    {
        //SELECT * FROM posts LIMIT 10 OFFSET $page*10
        return new Response(sprintf('Liste des post de la page #%d,<ul><li>some post</li><li>some post</li><li>some post</li></ul>',$page));
    }
    /**
     * @Route("/blog/{title}")
     */
    public function showPost(string $title = '') : Response
    {
        //SELECT * FROM posts WHERE title ='$title'
        return new Response('Article '.$title);
    }

}