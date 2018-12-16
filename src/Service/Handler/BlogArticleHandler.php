<?php

namespace App\Service\Handler;

use App\Service\Handler\General\CommonHandler;
use App\Entity\BlogArticle;

class BlogArticleHandler extends CommonHandler
{
	protected $blogArticleRepo;

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

		// $blogArticle->setHeadlineSlug(uniqid());

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

	/**
     * Delete the file
     *
     * @param BlogArticle $blogArticle
     *
     * @return bool
     */
    public function deleteFile(BlogArticle $blogArticle)
    {
        $blogArticle->setImage(null);

        $this->em->flush();

        return true;
    }

}
