<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleAdminLogs
 *
 * @ORM\Table(name="dle_admin_logs", indexes={@ORM\Index(name="date", columns={"date"})})
 * @ORM\Entity
 */
class DleAdminLogs
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';

    /**
     * @var int
     *
     * @ORM\Column(name="action", type="integer", nullable=false)
     */
    private $action = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="extras", type="text", length=65535, nullable=false)
     */
    private $extras;


}
