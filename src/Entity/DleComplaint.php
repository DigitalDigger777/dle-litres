<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleComplaint
 *
 * @ORM\Table(name="dle_complaint", indexes={@ORM\Index(name="p_id", columns={"p_id"}), @ORM\Index(name="c_id", columns={"c_id"}), @ORM\Index(name="n_id", columns={"n_id"})})
 * @ORM\Entity
 */
class DleComplaint
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
     * @ORM\Column(name="p_id", type="integer", nullable=false)
     */
    private $pId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="c_id", type="integer", nullable=false)
     */
    private $cId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="n_id", type="integer", nullable=false)
     */
    private $nId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="from", type="string", length=40, nullable=false)
     */
    private $from = '';

    /**
     * @var string
     *
     * @ORM\Column(name="to", type="string", length=255, nullable=false)
     */
    private $to = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';


}
