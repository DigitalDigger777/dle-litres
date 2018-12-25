<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleVoteResult
 *
 * @ORM\Table(name="dle_vote_result", indexes={@ORM\Index(name="answer", columns={"answer"}), @ORM\Index(name="ip", columns={"ip"}), @ORM\Index(name="vote_id", columns={"vote_id"}), @ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class DleVoteResult
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
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name = '';

    /**
     * @var int
     *
     * @ORM\Column(name="vote_id", type="integer", nullable=false)
     */
    private $voteId = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="answer", type="boolean", nullable=false)
     */
    private $answer = '0';


}
