<?php

declare(strict_types=1);

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController
{
    /**
     * @Route("/blog/{page}", requirements={"page":"\d+"})
     */
    public function listPosts(int $page = 0): Response
    {
        // SELECT * FROM posts LIMIT 10 OFFSET $page*10
        return new Response('List des postes de la page #'.$page.', <ul><li>some post</li><li>otherpost</li></ul>');
    }

    /**
     * @Route("/blog/{title}")
     */
    public function showPost(string $title = ''): Response
    {
        // SELECT * FROM posts WHERE title = $title
        return new Response('Article '.$title);
    }
}
