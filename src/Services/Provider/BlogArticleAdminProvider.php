<?php

namespace App\Services\Provider;

use App\Services\Provider\CommonProvider;


class BlogArticleAdminProvider extends CommonProvider
{
	protected $blogArticleRepo;


	public function initRepositories()
	{
		$this->categoryRepo = $this->em->getRepository('App:BlogArticle');
    }
    
}
