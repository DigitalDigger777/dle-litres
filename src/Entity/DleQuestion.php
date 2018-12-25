<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleQuestion
 *
 * @ORM\Table(name="dle_question")
 * @ORM\Entity
 */
class DleQuestion
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
     * @ORM\Column(name="question", type="string", length=255, nullable=false)
     */
    private $question = '';

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", length=65535, nullable=false)
     */
    private $answer;


}
