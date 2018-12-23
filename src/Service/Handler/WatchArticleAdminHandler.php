<?php

namespace App\Service\Handler;

use App\Entity\WatchArticle;
use App\Service\Handler\General\CommonHandler;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class WatchArticleAdminHandler extends CommonHandler
{
	protected $watchArticleRepo;

	public function initRepositories()
	{
		$this->watchArticleRepo = $this->em->getRepository('App:WatchArticle');
	}

	/**
	 * Save a watchArticle
	 *
	 * @param WatchArticle $watchArticle
	 * @param String $oldFileName name of old file
	 * @param boolean $andFlush Automatically flush
	 *
	 * @return WatchArticle $watchArticle
	 */
	public function saveWatchArticle(WatchArticle $watchArticle, String $oldFileName = null, bool $andFlush = true)
	{

		// if file is uploaded via the form
		if($watchArticle->getImage() !== null) {

			/**
			 * @var UploadedFile $image
			 * get the file instance of the uploaded file via the form
			*/
			$image = $watchArticle->getImage();
			$imageName = $this->fileUploader->upload($image, "watch_article");
			$watchArticle->setImage($imageName);

		} else {
			// replace the file instance of null (no file from the form) by the path file in the database
			$watchArticle->setImage($oldFileName);
		}
		
		$this->em->persist($watchArticle);
		if ($andFlush) {
			$this->em->flush();
		}

		return $watchArticle;
	}

	/**
	 * Delete a watchArticle
     *
     * @param WatchArticle $watchArticle
     *
     * @return bool
	 */
	public function deleteWatchArticle(WatchArticle $watchArticle)
	{
		$this->em->remove($watchArticle);
		$this->em->flush();

		return true;
	}

	/**
     * Delete the file
     *
     * @param WatchArticle $watchArticle
     *
     * @return bool
     */
    public function deleteFile(WatchArticle $watchArticle)
    {
        $watchArticle->setImage(null);

        $this->em->flush();

        return true;
    }

}
