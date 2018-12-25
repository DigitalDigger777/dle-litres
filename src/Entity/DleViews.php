<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleViews
 *
 * @ORM\Table(name="dle_views")
 * @ORM\Entity
 */
class DleViews
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


}
