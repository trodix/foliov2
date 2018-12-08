<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class SocietyAdminController extends AbstractController
{
    /**
     * @Route("/society", name="society_index")
     */
    public function index()
    {
        return $this->render('society_admin/index.html.twig', [
            'controller_name' => 'SocietyAdminController',
        ]);
    }
}
