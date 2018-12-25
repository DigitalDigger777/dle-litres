<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleImages
 *
 * @ORM\Table(name="dle_images", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="author", columns={"author"})})
 * @ORM\Entity
 */
class DleImages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="images", type="text", length=65535, nullable=false)
     */
    private $images;

    /**
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=40, nullable=false)
     */
    private $author = '';

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=15, nullable=false)
     */
    private $date = '';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param string $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return int
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * @param int $newsId
     */
    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

}
