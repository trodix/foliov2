<?php

namespace App\Controller;

use App\Entity\Society;
use App\Form\SocietyType;
use App\Service\Handler\SocietyAdminHandler;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Provider\SocietyAdminProvider;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/admin", name="admin_")
 */
class SocietyAdminController extends AbstractController
{
    /**
     * @Route("/settings", name="society_index", methods={"GET","POST"})
     */
    public function index(SocietyAdminHandler $handler, SocietyAdminProvider $provider, Request $request)
    {
        $society = $provider->getOneById(1);

        if ($society == null) {
            $society = new Society();
        }

        $form = $this->createForm(SocietyType::class, $society);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {

            $handler->saveSociety($society);

            $this->addFlash('success', 'admin_society.flash.updated');

            return $this->redirectToRoute('admin_society_index');
        }

        return $this->render('society_admin/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
