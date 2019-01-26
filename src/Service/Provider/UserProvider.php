<?php

namespace App\Service\Provider;

use App\Service\Provider\General\CommonProvider;


class UserProvider extends CommonProvider
{
	protected $userRepo;


	public function initRepositories()
	{
		$this->userRepo = $this->em->getRepository('App:User');
	}

	/**
	 * Get all the user
	 */
	public function getAllUser()
	{
		return $this->userRepo->findAll();
	}

	/**
     * Get one by ID
     * @param int $id
     * @return mixed
     */
	public function getOneById(int $id)
    {
        return $this->userRepo->findOneById($id);
    }

}
