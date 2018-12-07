<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SocietyController extends AbstractController
{
    /**
     * @Route("/society", name="society")
     */
    public function index()
    {
        return $this->render('society/index.html.twig', [
            'controller_name' => 'SocietyController',
        ]);
    }
}
