<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleLostdb
 *
 * @ORM\Table(name="dle_lostdb", indexes={@ORM\Index(name="lostid", columns={"lostid"})})
 * @ORM\Entity
 */
class DleLostdb
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
     * @ORM\Column(name="lostname", type="integer", nullable=false)
     */
    private $lostname = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="lostid", type="string", length=40, nullable=false)
     */
    private $lostid = '';


}
