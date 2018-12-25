<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DlePollLog
 *
 * @ORM\Table(name="dle_poll_log", indexes={@ORM\Index(name="news_id", columns={"news_id", "member"})})
 * @ORM\Entity
 */
class DlePollLog
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
     * @ORM\Column(name="news_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $newsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="member", type="string", length=40, nullable=false)
     */
    private $member = '';


}
