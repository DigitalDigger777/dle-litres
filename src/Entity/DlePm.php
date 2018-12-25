<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DlePm
 *
 * @ORM\Table(name="dle_pm", indexes={@ORM\Index(name="folder", columns={"folder"}), @ORM\Index(name="user_from", columns={"user_from"}), @ORM\Index(name="user", columns={"user"}), @ORM\Index(name="pm_read", columns={"pm_read"})})
 * @ORM\Entity
 */
class DlePm
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
     * @ORM\Column(name="subj", type="string", length=255, nullable=false)
     */
    private $subj = '';

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var int
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="user_from", type="string", length=40, nullable=false)
     */
    private $userFrom = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="pm_read", type="boolean", nullable=false)
     */
    private $pmRead = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="folder", type="string", length=10, nullable=false)
     */
    private $folder = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="reply", type="boolean", nullable=false)
     */
    private $reply = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="sendid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $sendid = '0';


}
