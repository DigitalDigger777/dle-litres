<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DlePoll
 *
 * @ORM\Table(name="dle_poll", indexes={@ORM\Index(name="news_id", columns={"news_id"})})
 * @ORM\Entity
 */
class DlePoll
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
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="frage", type="string", length=200, nullable=false)
     */
    private $frage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=false)
     */
    private $body;

    /**
     * @var int
     *
     * @ORM\Column(name="votes", type="integer", nullable=false)
     */
    private $votes = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="multiple", type="boolean", nullable=false)
     */
    private $multiple = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", length=65535, nullable=false)
     */
    private $answer;


}
