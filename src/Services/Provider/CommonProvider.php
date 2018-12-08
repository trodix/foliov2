<?php

namespace App\Services\Provider;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class CommonProvider
{
	protected $em;
	// protected $session;
	protected $mainRepo; // you have to hydrat it with the children to access the main function in the repo


	// public function setEntityManager(EntityManager $em)
	// {
	// 	$this->em = $em;
	// }

	// public function setSession(Session $session)
	// {
	// 	$this->session = $session;
	// }

	// public function initEntityManagers(){}

	// public function initRepositories(){}

	// /**
	//  * Adds a flash message to the current session for type.
	//  *
	//  * @param string $type    The type
	//  * @param string $message The message
	//  *
	//  * @throws \LogicException
	//  */
	// protected function addFlash($type, $message)
	// {
	// 	$this->session->getFlashBag()->add($type, $message);
	// }

    /**
     * same as the basic function with the same name
     * @param array|null $array1
     * @param array|null $array2
     * @return mixed
     */
    public function findAll(array $array1 = null, array $array2 = null )
    {

        return $this->mainRepo->findAll($array1,$array2 );
    }
}
