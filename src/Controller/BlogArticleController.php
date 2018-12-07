<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogArticleController extends AbstractController
{
    /**
     * @Route("/blog/article", name="blog_article")
     */
    public function index()
    {
        return $this->render('blog_article/index.html.twig', [
            'controller_name' => 'BlogArticleController',
        ]);
    }
}
