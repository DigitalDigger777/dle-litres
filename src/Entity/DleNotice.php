<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleNotice
 *
 * @ORM\Table(name="dle_notice", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class DleNotice
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
     * @ORM\Column(name="notice", type="text", length=65535, nullable=false)
     */
    private $notice;


}
