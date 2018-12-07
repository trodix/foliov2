<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogArticleRepository")
 */
class BlogArticle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subhead;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headlineSlug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getSubhead(): ?string
    {
        return $this->subhead;
    }

    public function setSubhead(?string $subhead): self
    {
        $this->subhead = $subhead;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getHeadlineSlug(): ?string
    {
        return $this->headlineSlug;
    }

    public function setHeadlineSlug(string $headlineSlug): self
    {
        $this->headlineSlug = $headlineSlug;

        return $this;
    }
}
