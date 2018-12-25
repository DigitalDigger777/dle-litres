<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleStaticFiles
 *
 * @ORM\Table(name="dle_static_files", indexes={@ORM\Index(name="static_id", columns={"static_id"}), @ORM\Index(name="author", columns={"author"}), @ORM\Index(name="onserver", columns={"onserver"})})
 * @ORM\Entity
 */
class DleStaticFiles
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
     * @ORM\Column(name="static_id", type="integer", nullable=false)
     */
    private $staticId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=40, nullable=false)
     */
    private $author = '';

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=50, nullable=false)
     */
    private $date = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="onserver", type="string", length=250, nullable=false)
     */
    private $onserver = '';

    /**
     * @var int
     *
     * @ORM\Column(name="dcount", type="integer", nullable=false)
     */
    private $dcount = '0';


}
