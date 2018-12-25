<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleSocialLogin
 *
 * @ORM\Table(name="dle_social_login", indexes={@ORM\Index(name="sid", columns={"sid"})})
 * @ORM\Entity
 */
class DleSocialLogin
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
     * @ORM\Column(name="sid", type="string", length=40, nullable=false)
     */
    private $sid = '';

    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", nullable=false)
     */
    private $uid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="provider", type="string", length=15, nullable=false)
     */
    private $provider = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="wait", type="boolean", nullable=false)
     */
    private $wait = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="waitlogin", type="boolean", nullable=false)
     */
    private $waitlogin = '0';


}
