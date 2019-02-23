<?php

namespace App\Controller;

use App\Entity\BlogArticle;
use App\Form\BlogArticleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Handler\BlogArticleAdminHandler;
use App\Service\Provider\BlogArticleAdminProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
/**
 * @Route("/admin", name="admin_")
 */
class BlogArticleAdminController extends AbstractController
{
    /**
     * @Route("/blog/article", name="blog_article_index", methods={"GET"})
     */
    public function index(BlogArticleAdminProvider $provider)
    {

        $articles = $provider->getAllBlogArticle();

        return $this->render('blog_article_admin/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/blog/article/add", name="blog_article_add", methods={"GET","POST"})
     */
    public function add(BlogArticleAdminHandler $handler, Request $request)
    {

        $blogArticle = new BlogArticle();

        $form = $this->createForm(BlogArticleType::class, $blogArticle );

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            
            // persist entity and redirect to list or stay
            $handler->saveBlogArticle($blogArticle);

            $this->addFlash('success', 'admin_blog_article.flash.created');

            return $this->redirectToRoute('admin_blog_article_index');
        }

        return $this->render('blog_article_admin/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/blog/article/{id}/edit", name="blog_article_edit", methods={"GET","POST"})
     * @ParamConverter("blogArticle", options={"id": "id"})
     */
    public function edit(BlogArticle $blogArticle, Request $request, BlogArticleAdminHandler $handler)
    {
        $form = $this->createForm(BlogArticleType::class, $blogArticle );

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            
            // persist entity and redirect to list or stay
            $handler->saveBlogArticle($blogArticle);

            $this->addFlash('success', 'admin_blog_article.flash.updated');

            return $this->redirectToRoute('admin_blog_article_index');
        }

        return $this->render('blog_article_admin/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/blog/article/{id}/delete", name="blog_article_delete", methods={"GET"})
     * @ParamConverter("blogArticle", options={"id": "id"})
     */
    public function delete(BlogArticle $blogArticle, BlogArticleAdminHandler $handler)
    {
        if ($handler->deleteBlogArticle($blogArticle)) {
            $this->addFlash('success', 'admin_blog_article.flash.deleted');
        }
        else {
            $this->addFlash('error', 'admin_blog_article.flash.delete_error');
        }

        return $this->redirectToRoute('admin_blog_article_index');
    }
}
