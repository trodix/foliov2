<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class SkillAdminController extends AbstractController
{
    /**
     * @Route("/skill", name="skill_index")
     */
    public function index()
    {
        return $this->render('skill_admin/index.html.twig', [
            'controller_name' => 'SkillAdminController',
        ]);
    }
}
