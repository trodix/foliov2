<?php

namespace App\Service\Provider;

use App\Service\Provider\General\CommonProvider;


class SocietyAdminProvider extends CommonProvider
{
	protected $societyRepo;

	public function initRepositories()
	{
		$this->societyRepo = $this->em->getRepository('App:Society');
	}

	// /**
	//  * Get all the society
	//  */
	// public function getAllSociety()
	// {
	// 	return $this->societyRepo->findAll();
	// }

	/**
     * Get one by ID
     * @param int $id
     * @return mixed
     */
	public function getOneById(int $id)
    {
        return $this->societyRepo->findOneById($id);
    }

}
