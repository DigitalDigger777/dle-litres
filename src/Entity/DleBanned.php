<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleBanned
 *
 * @ORM\Table(name="dle_banned", indexes={@ORM\Index(name="user_id", columns={"users_id"})})
 * @ORM\Entity
 */
class DleBanned
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="users_id", type="integer", nullable=false)
     */
    private $usersId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="text", length=65535, nullable=false)
     */
    private $descr;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=15, nullable=false)
     */
    private $date = '';

    /**
     * @var int
     *
     * @ORM\Column(name="days", type="smallint", nullable=false)
     */
    private $days = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     */
    private $ip = '';


}
