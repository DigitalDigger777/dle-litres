<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleReadLog
 *
 * @ORM\Table(name="dle_read_log", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="ip", columns={"ip"})})
 * @ORM\Entity
 */
class DleReadLog
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
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';


}
