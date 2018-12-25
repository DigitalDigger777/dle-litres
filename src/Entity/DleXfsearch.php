<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleXfsearch
 *
 * @ORM\Table(name="dle_xfsearch", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="tagvalue", columns={"tagvalue"}), @ORM\Index(name="tagname", columns={"tagname"})})
 * @ORM\Entity
 */
class DleXfsearch
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
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="tagname", type="string", length=50, nullable=false)
     */
    private $tagname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="tagvalue", type="string", length=100, nullable=false)
     */
    private $tagvalue = '';


}
