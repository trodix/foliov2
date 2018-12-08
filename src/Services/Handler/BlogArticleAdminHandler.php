<?php

namespace App\Services\Handler;

use App\Entity\BlogArticle;
use Doctrine\ORM\EntityManager;
use App\Services\Handler\CommonHandler;

class BlogArticleAdminHandler extends CommonHandler {

	protected $blogArticleRepo;

	public function __construct(EntityManager $em) {
		$this->em = $em;
		// $this->session = $session;
		$this->initRepositories();
	}

	public function initRepositories()
	{
		$this->blogArticleRepo = $this->em->getRepository('App:BlogArticle');
	}

	/**
	 * Save a blogArticle
	 *
	 * @param BlogArticle $blogArticle
	 * @param boolean $andFlush Automatically flush
	 *
	 * @return BlogArticle $blogArticle
	 */
	public function saveBlogArticle(BlogArticle $blogArticle, bool $andFlush = true)
	{

		$blogArticle->setHeadlineSlug(uniqid());
		$this->em->persist($blogArticle);
		if ($andFlush) {
			$this->em->flush();
		}

		return $blogArticle;
	}

	/**
	 * Delete a blogArticle
     *
     * @param BlogArticle $blogArticle
     *
     * @return bool
	 */
	public function deleteBlogArticle(BlogArticle $blogArticle)
	{
        $this->em->remove($blogArticle);
        $this->em->flush();

        return true;
	}

}