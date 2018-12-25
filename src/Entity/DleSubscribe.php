<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleSubscribe
 *
 * @ORM\Table(name="dle_subscribe", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class DleSubscribe
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
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email = '';

    /**
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=32, nullable=false)
     */
    private $hash = '';


}
