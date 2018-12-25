<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleComments
 *
 * @ORM\Table(name="dle_comments", indexes={@ORM\Index(name="post_id", columns={"post_id"}), @ORM\Index(name="parent", columns={"parent"}), @ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="approve", columns={"approve"}), @ORM\Index(name="text", columns={"text"})})
 * @ORM\Entity
 */
class DleComments
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
     * @ORM\Column(name="post_id", type="integer", nullable=false)
     */
    private $postId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="2000-01-01 00:00:00"})
     */
    private $date = '2000-01-01 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=40, nullable=false)
     */
    private $autor = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=40, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_register", type="boolean", nullable=false)
     */
    private $isRegister = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="approve", type="boolean", nullable=false, options={"default"="1"})
     */
    private $approve = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     */
    private $rating = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="vote_num", type="integer", nullable=false)
     */
    private $voteNum = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="parent", type="integer", nullable=false)
     */
    private $parent = '0';


}
