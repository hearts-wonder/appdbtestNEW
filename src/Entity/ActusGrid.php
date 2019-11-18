<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActusGrid
 *
 * @ORM\Table(name="actus_grid")
 * @ORM\Entity(repositoryClass="App\Repository\ActusRepository")
 */
class ActusGrid
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=255, nullable=false)
     */
    private $theme;

    /**
     * @var int|null
     *
     * @ORM\Column(name="img", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $img = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $updatedAt = 'NULL';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActusArticle", inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $actusArticle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getImg(): ?int
    {
        return $this->img;
    }

    public function setImg(?int $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getActusArticle(): ?ActusArticle
    {
        return $this->actusArticle;
    }

    public function setActusArticle(?ActusArticle $actusArticle): self
    {
        $this->actusArticle = $actusArticle;

        return $this;
    }


}
