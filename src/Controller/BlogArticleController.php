<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog", name="blog_")
 */
class BlogArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article_index")
     */
    public function index()
    {
        return $this->render('blog_article/index.html.twig', [
            'controller_name' => 'BlogArticleController',
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show()
    {
        return $this->render('blog_article/index.html.twig', [
            'controller_name' => 'BlogArticleController',
        ]);
    }
}
