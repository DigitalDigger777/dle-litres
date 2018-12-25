<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleLinks
 *
 * @ORM\Table(name="dle_links")
 * @ORM\Entity
 */
class DleLinks
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
     * @ORM\Column(name="word", type="string", length=255, nullable=false)
     */
    private $word = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="only_one", type="boolean", nullable=false)
     */
    private $onlyOne = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="replacearea", type="boolean", nullable=false, options={"default"="1"})
     */
    private $replacearea = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="rcount", type="boolean", nullable=false)
     */
    private $rcount = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="targetblank", type="boolean", nullable=false)
     */
    private $targetblank = '0';


}
