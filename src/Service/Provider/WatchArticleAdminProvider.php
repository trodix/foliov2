<?php

namespace App\Service\Provider;

use App\Service\Provider\General\CommonProvider;


class WatchArticleAdminProvider extends CommonProvider
{
	protected $watchArticleRepo;


	public function initRepositories()
	{
		$this->watchArticleRepo = $this->em->getRepository('App:WatchArticle');
	}

	/**
	 * Get all the watch article
	 */
	public function getAllWatchArticle()
	{
		return $this->watchArticleRepo->findAll();
	}

	/**
     * Get one by ID
     * @param int $id
     * @return mixed
     */
	public function getOneById(int $id)
    {
        return $this->watchArticleRepo->findOneById($id);
    }

}
