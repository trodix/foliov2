<?php

namespace App\Controller;

use App\Entity\BlogArticle;
use App\Form\BlogArticleType;
use App\Handler\BlogArticleAdminHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin", name="admin_")
 */
class BlogArticleAdminController extends AbstractController
{
    /**
     * @Route("/blog/article", name="blog_article_index", methods={"GET"})
     */
    public function index()
    {
        return $this->render('blog_article_admin/index.html.twig', [
            'articles' => [],
        ]);
    }

    /**
     * @Route("/blog/article/add", name="blog_article_new", methods={"GET","POST"})
     */
    public function add(Request $request)
    {

        $blogArticle = new BlogArticle();

        $form = $this->createForm(BlogArticleType::class, $blogArticle );

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            
            // persist entity and redirect to list or stay
            $this->get(BlogArticleAdminHandler::class)->saveBlogArticle($blogArticle);

            $this->addFlash('success', 'category_admin.flash.created');

            return $this->redirectToRoute('admin_blog_article_index');
        }

        return $this->render('blog_article_admin/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/blog/article/{id}/edit", name="blog_article_edit", methods={"GET","POST"})
     */
    public function update()
    {
        return $this->render('blog_article_admin/index.html.twig', [
            'controller_name' => 'BlogArticleAdminController',
        ]);
    }

    /**
     * @Route("/blog/article/{id}/delete", name="blog_article_delete", methods={"DELETE"})
     */
    public function delete()
    {
        return $this->render('blog_article_admin/index.html.twig', [
            'controller_name' => 'BlogArticleAdminController',
        ]);
    }
}
