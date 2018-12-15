<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Provider\BlogArticleProvider;

/**
 * @Route("/blog", name="blog_")
 */
class BlogArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article_index")
     */
    public function index(BlogArticleProvider $provider)
    {

        $articles = $provider->getAllBlogArticle();

        return $this->render('blog_article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show(BlogArticleProvider $provider, $id)
    {

        $article = $provider->getOneById($id);

        return $this->render('blog_article/show.html.twig', [
            'article' => $article
        ]);
    }
}
