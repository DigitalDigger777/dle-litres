<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleSpamLog
 *
 * @ORM\Table(name="dle_spam_log", indexes={@ORM\Index(name="ip", columns={"ip"}), @ORM\Index(name="is_spammer", columns={"is_spammer"})})
 * @ORM\Entity
 */
class DleSpamLog
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
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_spammer", type="boolean", nullable=false)
     */
    private $isSpammer = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';


}
