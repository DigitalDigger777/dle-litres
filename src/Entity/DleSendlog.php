<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleSendlog
 *
 * @ORM\Table(name="dle_sendlog", indexes={@ORM\Index(name="user", columns={"user"}), @ORM\Index(name="flag", columns={"flag"}), @ORM\Index(name="date", columns={"date"})})
 * @ORM\Entity
 */
class DleSendlog
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
     * @ORM\Column(name="user", type="string", length=40, nullable=false)
     */
    private $user = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="flag", type="boolean", nullable=false)
     */
    private $flag = '0';


}
