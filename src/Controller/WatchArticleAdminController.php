<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class WatchArticleAdminController extends AbstractController
{
    /**
     * @Route("/watch/article", name="watch_article_index")
     */
    public function index()
    {
        return $this->render('watch_article_admin/index.html.twig', [
            'controller_name' => 'WatchArticleAdminController',
        ]);
    }
}
