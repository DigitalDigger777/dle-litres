<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleFlood
 *
 * @ORM\Table(name="dle_flood", indexes={@ORM\Index(name="id", columns={"id"}), @ORM\Index(name="ip", columns={"ip"}), @ORM\Index(name="flag", columns={"flag"})})
 * @ORM\Entity
 */
class DleFlood
{
    /**
     * @var int
     *
     * @ORM\Column(name="f_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=20, nullable=false)
     */
    private $id = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="flag", type="boolean", nullable=false)
     */
    private $flag = '0';


}
