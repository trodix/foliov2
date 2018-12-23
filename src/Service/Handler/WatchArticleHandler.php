<?php

namespace App\Service\Handler;

use App\Service\Handler\General\CommonHandler;
use App\Entity\WatchArticle;

class WatchArticleHandler extends CommonHandler
{
	protected $watchArticleRepo;

	public function initRepositories()
	{
		$this->watchArticleRepo = $this->em->getRepository('App:WatchArticle');
	}

	/**
	 * Save a watch article
	 *
	 * @param WatchArticle $watchArticle
	 * @param boolean $andFlush Automatically flush
	 *
	 * @return WatchArticle $watchArticle
	 */
	public function saveWatchArticle(WatchArticle $watchArticle, bool $andFlush = true)
	{

		// $skill->setHeadlineSlug(uniqid());

		$this->em->persist($watchArticle);
		if ($andFlush) {
			$this->em->flush();
		}

		return $watchArticle;
	}

	/**
	 * Delete a watch article
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
