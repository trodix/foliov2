<?php

namespace App\Controller;

use App\Service\Provider\SkillProvider;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SkillController extends AbstractController
{
    /**
     * @Route("/skill", name="skill_index")
     */
    public function index(SkillProvider $provider)
    {

        $skills = $provider->getAllSkill();

        return $this->render('skill/index.html.twig', [
            'skills' => $skills
        ]);
    }

}
