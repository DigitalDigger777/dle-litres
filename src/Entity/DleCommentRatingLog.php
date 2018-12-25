<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleCommentRatingLog
 *
 * @ORM\Table(name="dle_comment_rating_log", indexes={@ORM\Index(name="member", columns={"member"}), @ORM\Index(name="c_id", columns={"c_id"}), @ORM\Index(name="ip", columns={"ip"})})
 * @ORM\Entity
 */
class DleCommentRatingLog
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
     * @ORM\Column(name="c_id", type="integer", nullable=false)
     */
    private $cId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="member", type="string", length=40, nullable=false)
     */
    private $member = '';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="rating", type="boolean", nullable=false)
     */
    private $rating = '0';


}
