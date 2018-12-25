<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleTags
 *
 * @ORM\Table(name="dle_tags", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="tag", columns={"tag"})})
 * @ORM\Entity
 */
class DleTags
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
     * @ORM\Column(name="tag", type="string", length=100, nullable=false)
     */
    private $tag = '';


}
