<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleRss
 *
 * @ORM\Table(name="dle_rss")
 * @ORM\Entity
 */
class DleRss
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
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_main", type="boolean", nullable=false)
     */
    private $allowMain = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_rating", type="boolean", nullable=false)
     */
    private $allowRating = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_comm", type="boolean", nullable=false)
     */
    private $allowComm = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="text_type", type="boolean", nullable=false)
     */
    private $textType = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="date", type="boolean", nullable=false)
     */
    private $date = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="search", type="text", length=65535, nullable=false)
     */
    private $search;

    /**
     * @var bool
     *
     * @ORM\Column(name="max_news", type="boolean", nullable=false)
     */
    private $maxNews = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cookie", type="text", length=65535, nullable=false)
     */
    private $cookie;

    /**
     * @var int
     *
     * @ORM\Column(name="category", type="smallint", nullable=false)
     */
    private $category = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lastdate", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $lastdate = '0';


}
