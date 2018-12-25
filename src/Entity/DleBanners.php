<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleBanners
 *
 * @ORM\Table(name="dle_banners")
 * @ORM\Entity
 */
class DleBanners
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_tag", type="string", length=40, nullable=false)
     */
    private $bannerTag = '';

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=200, nullable=false)
     */
    private $descr = '';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="text", length=65535, nullable=false)
     */
    private $code;

    /**
     * @var bool
     *
     * @ORM\Column(name="approve", type="boolean", nullable=false)
     */
    private $approve = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="short_place", type="boolean", nullable=false)
     */
    private $shortPlace = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="bstick", type="boolean", nullable=false)
     */
    private $bstick = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="main", type="boolean", nullable=false)
     */
    private $main = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     */
    private $category = '';

    /**
     * @var string
     *
     * @ORM\Column(name="grouplevel", type="string", length=100, nullable=false, options={"default"="all"})
     */
    private $grouplevel = 'all';

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="string", length=15, nullable=false)
     */
    private $start = '';

    /**
     * @var string
     *
     * @ORM\Column(name="end", type="string", length=15, nullable=false)
     */
    private $end = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="fpage", type="boolean", nullable=false)
     */
    private $fpage = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="innews", type="boolean", nullable=false)
     */
    private $innews = '0';


}
