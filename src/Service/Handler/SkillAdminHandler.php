<?php

namespace App\Service\Handler;

use App\Entity\Skill;
use App\Service\Handler\General\CommonHandler;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SkillAdminHandler extends CommonHandler
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
	 * @param String $oldFileName name of old file
	 * @param boolean $andFlush Automatically flush
	 *
	 * @return Skill $skill
	 */
	public function saveSkill(Skill $skill, String $oldFileName = null, bool $andFlush = true)
	{

		// if file is uploaded via the form
		if($skill->getImage() !== null) {

			/**
			 * @var UploadedFile $image
			 * get the file instance of the uploaded file via the form
			*/
			$image = $skill->getImage();
			$imageName = $this->fileUploader->upload($image);
			$skill->setImage($imageName);

		} else {
			// replace the file instance of null (no file from the form) by the path file in the database
			$skill->setImage($oldFileName);
		}
		
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
