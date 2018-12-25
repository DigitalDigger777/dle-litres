<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DlePost
 *
 * @ORM\Table(name="dle_post", indexes={@ORM\Index(name="symbol", columns={"symbol"}), @ORM\Index(name="fixed", columns={"fixed"}), @ORM\Index(name="autor", columns={"autor"}), @ORM\Index(name="category", columns={"category"}), @ORM\Index(name="allow_main", columns={"allow_main"}), @ORM\Index(name="comm_num", columns={"comm_num"}), @ORM\Index(name="short_story", columns={"short_story", "xfields", "title"}), @ORM\Index(name="alt_name", columns={"alt_name"}), @ORM\Index(name="approve", columns={"approve"}), @ORM\Index(name="date", columns={"date"})})
 * @ORM\Entity
 */
class DlePost
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
     * @ORM\Column(name="autor", type="string", length=40, nullable=false)
     */
    private $autor = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="2000-01-01 00:00:00"})
     */
    private $date = '2000-01-01 00:00:00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="short_story", type="text", length=16777215, nullable=true)
     */
    private $shortStory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="xfields", type="text", length=16777215, nullable=true)
     */
    private $xfields;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="descr", type="string", length=5000, nullable=true)
     */
    private $descr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keywords", type="text", length=65535, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=190, nullable=false)
     */
    private $category = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="alt_name", type="string", length=200, nullable=false)
     */
    private $altName = '';

    /**
     * @var int
     *
     * @ORM\Column(name="comm_num", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $commNum = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_comm", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowComm = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_main", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowMain = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="approve", type="boolean", nullable=false)
     */
    private $approve = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="fixed", type="boolean", nullable=false)
     */
    private $fixed = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_br", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowBr = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=3, nullable=false)
     */
    private $symbol = '';

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=250, nullable=false)
     */
    private $tags = '';

    /**
     * @var string
     *
     * @ORM\Column(name="metatitle", type="string", length=255, nullable=false)
     */
    private $metatitle = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="full_story", type="integer", nullable=true)
     */
    private $fullStory;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return null|string
     */
    public function getShortStory()
    {
        return $this->shortStory;
    }

    /**
     * @param null|string $shortStory
     */
    public function setShortStory($shortStory)
    {
        $this->shortStory = $shortStory;
    }

    /**
     * @return null|string
     */
    public function getXfields()
    {
        return $this->xfields;
    }

    /**
     * @param null|string $xfields
     */
    public function setXfields($xfields)
    {
        $this->xfields = $xfields;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @param null|string $descr
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;
    }

    /**
     * @return null|string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param null|string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getAltName()
    {
        return $this->altName;
    }

    /**
     * @param string $altName
     */
    public function setAltName($altName)
    {
        $this->altName = $altName;
    }

    /**
     * @return int
     */
    public function getCommNum()
    {
        return $this->commNum;
    }

    /**
     * @param int $commNum
     */
    public function setCommNum($commNum)
    {
        $this->commNum = $commNum;
    }

    /**
     * @return bool
     */
    public function isAllowComm()
    {
        return $this->allowComm;
    }

    /**
     * @param bool $allowComm
     */
    public function setAllowComm($allowComm)
    {
        $this->allowComm = $allowComm;
    }

    /**
     * @return bool
     */
    public function isAllowMain()
    {
        return $this->allowMain;
    }

    /**
     * @param bool $allowMain
     */
    public function setAllowMain($allowMain)
    {
        $this->allowMain = $allowMain;
    }

    /**
     * @return bool
     */
    public function isApprove()
    {
        return $this->approve;
    }

    /**
     * @param bool $approve
     */
    public function setApprove($approve)
    {
        $this->approve = $approve;
    }

    /**
     * @return bool
     */
    public function isFixed()
    {
        return $this->fixed;
    }

    /**
     * @param bool $fixed
     */
    public function setFixed($fixed)
    {
        $this->fixed = $fixed;
    }

    /**
     * @return bool
     */
    public function isAllowBr()
    {
        return $this->allowBr;
    }

    /**
     * @param bool $allowBr
     */
    public function setAllowBr($allowBr)
    {
        $this->allowBr = $allowBr;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getMetatitle()
    {
        return $this->metatitle;
    }

    /**
     * @param string $metatitle
     */
    public function setMetatitle($metatitle)
    {
        $this->metatitle = $metatitle;
    }

    /**
     * @return int|null
     */
    public function getFullStory()
    {
        return $this->fullStory;
    }

    /**
     * @param int|null $fullStory
     */
    public function setFullStory($fullStory)
    {
        $this->fullStory = $fullStory;
    }
}
