<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="src\AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="Ctg_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var ArrayCollection|News[]
     *
     * @ORM\OneToMany(targetEntity="news", mappedBy="category", cascade={"persist", "remove"}, indexBy="id")
     */
    private $news;

    /**
     * @var string
     *
     * @ORM\Column(name="Ctg_Name", type="string", length=255, nullable=false, options={"comment": "Category name"})
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Ctg_Date_Added", type="datetime", nullable=false, options={"comment": "Category date added"})
     */
    private $dateAdded;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Category
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return News[]|ArrayCollection
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param $news
     *
     * @return Category
     */
    public function setNews($news): self
    {
        $this->news = $news;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Category
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdded(): \DateTime
    {
        return $this->dateAdded;
    }

    /**
     * @param \DateTime $dateAdded
     *
     * @return News
     */
    public function setDateAdded(\DateTime $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }
}
