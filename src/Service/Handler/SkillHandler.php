<?php

namespace App\Service\Handler;

use App\Service\Handler\General\CommonHandler;
use App\Entity\Skill;

class SkillHandler extends CommonHandler
{
	protected $skillRepo;

	public function initRepositories()
	{
		$this->skillRepo = $this->em->getRepository('App:Skill');
	}

	/**
	 * Save a skill
	 *
	 * @param Skill $skill
	 * @param boolean $andFlush Automatically flush
	 *
	 * @return Skill $skill
	 */
	public function saveSkill(Skill $skill, bool $andFlush = true)
	{

		// $skill->setHeadlineSlug(uniqid());

		$this->em->persist($skill);
		if ($andFlush) {
			$this->em->flush();
		}

		return $skill;
	}

	/**
	 * Delete a skill
     *
     * @param Skill $skill
     *
     * @return bool
	 */
	public function deleteSkill(Skill $skill)
	{
		$this->em->remove($skill);
		$this->em->flush();

		return true;
	}

	/**
     * Delete the file
     *
     * @param Skill $skill
     *
     * @return bool
     */
    public function deleteFile(Skill $skill)
    {
        $skill->setImage(null);

        $this->em->flush();

        return true;
    }

}
