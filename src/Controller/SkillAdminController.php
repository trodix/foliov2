<?php

namespace App\Controller;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Service\Handler\SkillAdminHandler;
use App\Service\Provider\SkillAdminProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/admin", name="admin_")
 */
class SkillAdminController extends AbstractController
{
    /**
     * @Route("/skill", name="skill_index")
     */
    public function index(SkillAdminProvider $provider)
    {

        $skills = $provider->getAllSkill();

        return $this->render('skill_admin/index.html.twig', [
            'skills' => $skills
        ]);
    }


    /**
     * @Route("/skill/add", name="skill_add", methods={"GET","POST"})
     */
    public function add(SkillAdminHandler $handler, Request $request)
    {

        $skill = new Skill();

        $form = $this->createForm(SkillType::class, $skill);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            
            // persist entity and redirect to list or stay
            $handler->saveSkill($skill);

            $this->addFlash('success', 'admin_skill.flash.created');

            return $this->redirectToRoute('admin_skill_index');
        }

        return $this->render('skill_admin/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/skill/{id}/edit", name="skill_edit", methods={"GET","POST"})
     * @ParamConverter("skill", options={"id": "id"})
     */
    public function edit(Skill $skill, Request $request, SkillAdminHandler $handler)
    {
        $oldFilePath = $skill->getImage();
        
        if($skill->getImage() !== null) {
            $skill->setImage(new File($this->getParameter('skill_directory').'/'.$skill->getImage()));
        }
        // $oldFilePath = $handler->fileUploader->initWhenUpdate($skill);
        
        $form = $this->createForm(SkillType::class, $skill);
        $form->add('image', FileType::class, ['required' => false]);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {

            // persist entity and redirect to list or stay
            $handler->saveSkill($skill, $oldFilePath);

            $this->addFlash('success', 'admin_skill.flash.updated');

            return $this->redirectToRoute('admin_skill_index');
        }

        return $this->render('skill_admin/edit.html.twig', [
            'form' => $form->createView(),
            'skill' => $skill,
            'skill_directory' => $this->getParameter('skill_directory').'/'
        ]);
    }

    /**
     * @Route("/skill/{id}/delete", name="skill_delete", methods={"GET"})
     * @ParamConverter("skill", options={"id": "id"})
     */
    public function delete(Skill $skill, SkillAdminHandler $handler)
    {
        if ($handler->deleteSkill($skill)) {
            $this->addFlash('success', 'admin_skill.flash.deleted');
        }
        else {
            $this->addFlash('error', 'admin_skill.flash.delete_error');
        }

        return $this->redirectToRoute('admin_skill_index');
    }

}
