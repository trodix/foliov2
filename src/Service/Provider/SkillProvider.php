<?php

namespace App\Service\Provider;

use App\Service\Provider\General\CommonProvider;


class SkillProvider extends CommonProvider
{
	protected $skillRepo;


	public function initRepositories()
	{
		$this->skillRepo = $this->em->getRepository('App:Skill');
	}

	/**
	 * Get all the skill
	 */
	public function getAllSkill()
	{
		return $this->skillRepo->findAll();
	}

	/**
     * Get one by ID
     * @param int $id
     * @return mixed
     */
	public function getOneById(int $id)
    {
        return $this->skillRepo->findOneById($id);
	}
	
	public function getOneBySlug(String $slug)
	{
		return $this->skillRepo->findOneBy(
			["headlineSlug" => $slug],
			["_order" => "ASC"]
		);
	}

}
