<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleVote
 *
 * @ORM\Table(name="dle_vote", indexes={@ORM\Index(name="approve", columns={"approve"})})
 * @ORM\Entity
 */
class DleVote
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
     * @ORM\Column(name="category", type="text", length=65535, nullable=false)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="vote_num", type="integer", nullable=false)
     */
    private $voteNum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=25, nullable=false)
     */
    private $date = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=false)
     */
    private $body;

    /**
     * @var bool
     *
     * @ORM\Column(name="approve", type="boolean", nullable=false, options={"default"="1"})
     */
    private $approve = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="string", length=15, nullable=false)
     */
    private $start = '';

    /**
     * @var string
     *
     * @ORM\Column(name="end", type="string", length=15, nullable=false)
     */
    private $end = '';

    /**
     * @var string
     *
     * @ORM\Column(name="grouplevel", type="string", length=250, nullable=false, options={"default"="all"})
     */
    private $grouplevel = 'all';


}
