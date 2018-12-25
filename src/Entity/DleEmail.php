<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleEmail
 *
 * @ORM\Table(name="dle_email")
 * @ORM\Entity
 */
class DleEmail
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=10, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="text", length=65535, nullable=false)
     */
    private $template;

    /**
     * @var bool
     *
     * @ORM\Column(name="use_html", type="boolean", nullable=false)
     */
    private $useHtml = '0';


}
