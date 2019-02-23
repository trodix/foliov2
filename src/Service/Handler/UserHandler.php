<?php

namespace App\Service\Handler;

use App\Entity\User;
use App\Service\Handler\General\CommonHandler;
use App\Service\GlobalService;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserHandler extends CommonHandler
{
    protected $userRepo;

	public function initRepositories()
	{
        $this->userRepo = $this->em->getRepository('App:User');     
    }

    public function updateUser($user, UserPasswordEncoderInterface $passwordEncoder, $andFlush = true) {

        $visiblePassword = $user->getPassword();

        $user->setPassword($passwordEncoder->encodePassword(
            $user,
            $visiblePassword
        ));

        $this->em->persist($user);
		if ($andFlush) {
			$this->em->flush();
		}

		return $user;
    }

}
