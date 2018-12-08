<?php

namespace App\Service\Provider;

use App\Service\Provider\General\CommonProvider;


class BlogArticleAdminProvider extends CommonProvider
{
	protected $blogArticleRepo;


	public function initRepositories()
	{
		$this->blogArticleRepo = $this->em->getRepository('App:BlogArticle');
	}

	/**
	 * Get all the blogArticle
	 */
	public function getAllBlogArticle()
	{
		return $this->blogArticleRepo->findAll();
	}

	/**
     * Get one by ID
     * @param int $id
     * @return mixed
     */
	public function getOneById(int $id)
    {
        return $this->blogArticleRepo->findOneById($id);
    }

}
