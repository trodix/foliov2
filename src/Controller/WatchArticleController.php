<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WatchArticleController extends AbstractController
{
    /**
     * @Route("/watch/article", name="watch_article")
     */
    public function index()
    {
        return $this->render('watch_article/index.html.twig', [
            'controller_name' => 'WatchArticleController',
        ]);
    }
}
