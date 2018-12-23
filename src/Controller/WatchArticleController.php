<?php

namespace App\Controller;

use App\Service\Provider\WatchArticleProvider;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WatchArticleController extends AbstractController
{
    /**
     * @Route("/watch/article", name="watch_article_index")
     */
    public function index(WatchArticleProvider $provider)
    {

        $articles = $provider->getAllWatchArticle();

        return $this->render('watch_article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/watch/article/{title_slug}", name="watch_article_show")
     */
    public function show(WatchArticleProvider $provider, $title_slug)
    {

        $article = $provider->getOneBySlug($title_slug);

        return $this->render('watch_article/show.html.twig', [
            'article' => $article
        ]);
    }
}
