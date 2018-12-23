<?php

namespace App\Controller;

use App\Entity\WatchArticle;
use App\Form\WatchArticleType;
use App\Service\Handler\WatchArticleAdminHandler;
use App\Service\Provider\WatchArticleAdminProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/admin", name="admin_")
 */
class WatchArticleAdminController extends AbstractController
{
    /**
     * @Route("/watch/article", name="watch_article_index")
     */
    public function index(WatchArticleAdminProvider $provider)
    {

        $watchArticles = $provider->getAllWatchArticle();

        return $this->render('watch_article_admin/index.html.twig', [
            'articles' => $watchArticles
        ]);
    }


    /**
     * @Route("/watch/article/add", name="watch_article_add", methods={"GET","POST"})
     */
    public function add(WatchArticleAdminHandler $handler, Request $request)
    {

        $watchArticle = new WatchArticle();

        $form = $this->createForm(WatchArticleType::class, $watchArticle);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            
            // persist entity and redirect to list or stay
            $handler->saveWatchArticle($watchArticle);

            $this->addFlash('success', 'admin_watchArticle.flash.created');

            return $this->redirectToRoute('admin_watch_article_index');
        }

        return $this->render('watch_article_admin/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/watch/article/{id}/edit", name="watch_article_edit", methods={"GET","POST"})
     * @ParamConverter("watchArticle", options={"id": "id"})
     */
    public function edit(WatchArticle $watchArticle, Request $request, WatchArticleAdminHandler $handler)
    {
        $oldFilePath = $watchArticle->getImage();

        if($watchArticle->getImage() !== null) {
            $watchArticle->setImage(new File($this->getParameter('watch_article_directory').'/'.$watchArticle->getImage()));
        }
        // $oldFilePath = $handler->fileUploader->initWhenUpdate($watchArticle);
        
        $form = $this->createForm(WatchArticleType::class, $watchArticle);
        $form->add('image', FileType::class, ['required' => false]);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {

            // persist entity and redirect to list or stay
            $handler->saveWatchArticle($watchArticle, $oldFilePath);

            $this->addFlash('success', 'admin_watchArticle.flash.updated');

            return $this->redirectToRoute('admin_watch_article_index');
        }

        return $this->render('watch_article_admin/edit.html.twig', [
            'form' => $form->createView(),
            'watchArticle' => $watchArticle,
            'ressource_path' => [
                'watchArticle' => [
                    'image' => 'uploads/library/watch_article/'.$oldFilePath
                ]
            ]
        ]);
    }

    /**
     * @Route("/watch/article/{id}/delete", name="watch_article_delete", methods={"GET"})
     * @ParamConverter("watchArticle", options={"id": "id"})
     */
    public function delete(WatchArticle $watchArticle, WatchArticleAdminHandler $handler)
    {
        if ($handler->deleteWatchArticle($watchArticle)) {
            $this->addFlash('success', 'admin_watchArticle.flash.deleted');
        }
        else {
            $this->addFlash('error', 'admin_watchArticle.flash.delete_error');
        }

        return $this->redirectToRoute('admin_watch_article_index');
    }

    /**
     * @Route("/watch/article/{id}/image/delete", name="watch_article_image_delete", methods={"GET"})
     * @ParamConverter("watchArticle", options={"id": "id"})
     */
    public function deleteImage(WatchArticle $watchArticle, WatchArticleAdminHandler $handler)
    {
        if ($handler->deleteFile($watchArticle)) {
            $this->addFlash('success', 'admin_watch_article_image.flash.deleted');
        }
        else {
            $this->addFlash('error', 'admin_watch_article_image.flash.delete_error');
        }

        return $this->redirectToRoute('admin_watch_article_edit', [
            'id' => $watchArticle->getId()
        ]);
    }

}
