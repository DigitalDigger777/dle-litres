<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleIgnoreList
 *
 * @ORM\Table(name="dle_ignore_list", indexes={@ORM\Index(name="user_from", columns={"user_from"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class DleIgnoreList
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
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="user_from", type="string", length=40, nullable=false)
     */
    private $userFrom = '';


}
