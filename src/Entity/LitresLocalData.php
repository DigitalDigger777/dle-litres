<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LitresLocalData
 *
 * @ORM\Table(name="litres_local_data", indexes={@ORM\Index(name="litresed", columns={"litresed"}), @ORM\Index(name="title", columns={"title"}), @ORM\Index(name="category", columns={"type"}), @ORM\Index(name="author", columns={"author"})})
 * @ORM\Entity
 */
class LitresLocalData
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
     * @ORM\Column(name="author", type="string", length=200, nullable=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500, nullable=false)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="litresed", type="boolean", nullable=false)
     */
    private $litresed;


}
