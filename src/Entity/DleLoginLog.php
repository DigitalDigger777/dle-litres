<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleLoginLog
 *
 * @ORM\Table(name="dle_login_log", uniqueConstraints={@ORM\UniqueConstraint(name="ip", columns={"ip"})}, indexes={@ORM\Index(name="date", columns={"date"})})
 * @ORM\Entity
 */
class DleLoginLog
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
     * @var int
     *
     * @ORM\Column(name="count", type="smallint", nullable=false)
     */
    private $count = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';


}
