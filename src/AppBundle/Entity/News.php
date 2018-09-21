<?php

namespace AppBundle\Entity;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="src\AppBundle\Repository\NewsRepository")
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="Nws_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="Nws_Ctg_Id", referencedColumnName="Ctg_Id", nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="Nws_Title", type="string", length=255, nullable=false, options={"comment": "News title"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Nws_Text", type="text", nullable=false, options={"comment": "News text"})
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Nws_Date_Added", type="datetime", nullable=false)
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
     * @return News
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory() : Category
    {
        return $this->category;
    }

    /**
     * @param $category
     *
     * @return News
     */
    public function setCategory($category) : self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param $title
     *
     * @return News
     */
    public function setTitle($title) : self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @param $text
     *
     * @return News
     */
    public function setText($text) : self
    {
        $this->text = $text;

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
