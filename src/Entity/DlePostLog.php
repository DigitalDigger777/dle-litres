<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DlePostLog
 *
 * @ORM\Table(name="dle_post_log", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="expires", columns={"expires"})})
 * @ORM\Entity
 */
class DlePostLog
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
     * @ORM\Column(name="expires", type="string", length=15, nullable=false)
     */
    private $expires = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="action", type="boolean", nullable=false)
     */
    private $action = '0';


}
