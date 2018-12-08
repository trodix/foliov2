<?php

namespace App\Services\Provider;

use App\Services\Provider\CommonProvider;


class BlogArticleAdminProvider extends CommonProvider
{

	public function __construct($em){
		$this->em = $em;
		$this->initRepositories();
	}


	public function initRepositories()
	{
		$this->mainRepo = $this->em->getRepository('App:BlogArticle');
    }
    
}
