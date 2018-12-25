<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleMailLog
 *
 * @ORM\Table(name="dle_mail_log", indexes={@ORM\Index(name="hash", columns={"hash"})})
 * @ORM\Entity
 */
class DleMailLog
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
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false)
     */
    private $mail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=40, nullable=false)
     */
    private $hash = '';


}
