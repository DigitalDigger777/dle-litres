<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleRssinform
 *
 * @ORM\Table(name="dle_rssinform")
 * @ORM\Entity
 */
class DleRssinform
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
     * @ORM\Column(name="tag", type="string", length=40, nullable=false)
     */
    private $tag = '';

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=false)
     */
    private $descr = '';

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=200, nullable=false)
     */
    private $category = '';

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url = '';

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="string", length=40, nullable=false)
     */
    private $template = '';

    /**
     * @var int
     *
     * @ORM\Column(name="news_max", type="smallint", nullable=false)
     */
    private $newsMax = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="tmax", type="smallint", nullable=false)
     */
    private $tmax = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="dmax", type="smallint", nullable=false)
     */
    private $dmax = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="approve", type="boolean", nullable=false, options={"default"="1"})
     */
    private $approve = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="rss_date_format", type="string", length=20, nullable=false)
     */
    private $rssDateFormat = '';


}
