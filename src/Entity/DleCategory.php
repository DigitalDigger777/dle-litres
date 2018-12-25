<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleCategory
 *
 * @ORM\Table(name="dle_category", indexes={@ORM\Index(name="alt_name", columns={"alt_name"})})
 * @ORM\Entity
 */
class DleCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="alt_name", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $altName = '';

    /**
     * @var int
     *
     * @ORM\Column(name="parentid", type="integer", nullable=false)
     */
    private $parentid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="posi", type="integer", nullable=false, options={"default"="1"})
     */
    private $posi = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=200, nullable=false)
     */
    private $icon = '';

    /**
     * @var string
     *
     * @ORM\Column(name="skin", type="string", length=50, nullable=false)
     */
    private $skin = '';

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=200, nullable=false)
     */
    private $descr = '';

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", length=65535, nullable=false)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="news_sort", type="string", length=10, nullable=false)
     */
    private $newsSort = '';

    /**
     * @var string
     *
     * @ORM\Column(name="news_msort", type="string", length=4, nullable=false)
     */
    private $newsMsort = '';

    /**
     * @var int
     *
     * @ORM\Column(name="news_number", type="smallint", nullable=false)
     */
    private $newsNumber = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="short_tpl", type="string", length=40, nullable=false)
     */
    private $shortTpl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="full_tpl", type="string", length=40, nullable=false)
     */
    private $fullTpl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="metatitle", type="string", length=255, nullable=false)
     */
    private $metatitle = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="show_sub", type="boolean", nullable=false)
     */
    private $showSub = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_rss", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowRss = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="smallint", nullable=false)
     */
    private $count = '0';


}
