<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\Handler\UserHandler;
use App\Service\Provider\UserProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
/**
 * @Route("/admin", name="admin_")
 */
class UserController extends AbstractController
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/user/profile", name="user_profile_index", methods={"GET", "POST"})
     */
    public function index(Security $security, Request $request, UserHandler $handler)
    {
        $user = $security->getUser();
        $form = $this->createForm(UserType::class, $user );

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            
            // persist entity and redirect to list or stay
            if($handler->updateUser($user, $this->passwordEncoder)) {
                $this->addFlash('success', 'admin_user.flash.updated');
            } else {
                // generate error message
                $this->addFlash('error', 'admin_user.flash.error');

                return $this->render('user_admin/index.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            

            return $this->redirectToRoute('admin_user_profile_index');
        }

        return $this->render('user_admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
