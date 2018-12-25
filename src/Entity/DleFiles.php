<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleFiles
 *
 * @ORM\Table(name="dle_files", indexes={@ORM\Index(name="news_id", columns={"news_id"})})
 * @ORM\Entity
 */
class DleFiles
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
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="onserver", type="string", length=250, nullable=false)
     */
    private $onserver = '';

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
     * @var int
     *
     * @ORM\Column(name="dcount", type="integer", nullable=false)
     */
    private $dcount = '0';


}
