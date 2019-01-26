<?php

namespace App\Service\Handler;

use App\Entity\Society;
use App\Service\Handler\General\CommonHandler;

class SocietyAdminHandler extends CommonHandler
{
	protected $societyRepo;

	public function initRepositories()
	{
		$this->societyRepo = $this->em->getRepository('App:Society');
	}

	/**
	 * Save a society
	 *
	 * @param Society $society
	 * @param boolean $andFlush Automatically flush
	 *
	 * @return Society $society
	 */
	public function saveSociety(Society $society, bool $andFlush = true)
	{

		$this->em->persist($society);
		if ($andFlush) {
			$this->em->flush();
		}

		return $society;
	}

	/**
	 * Delete a society
     *
     * @param Society $society
     *
     * @return bool
	 */
	public function deleteSociety(Society $society)
	{
		$this->em->remove($society);
		$this->em->flush();

		return true;
	}

}
