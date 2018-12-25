<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleStatic
 *
 * @ORM\Table(name="dle_static", indexes={@ORM\Index(name="name", columns={"name"}), @ORM\Index(name="template", columns={"template"})})
 * @ORM\Entity
 */
class DleStatic
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=false)
     */
    private $descr = '';

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="text", length=65535, nullable=false)
     */
    private $template;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_br", type="boolean", nullable=false)
     */
    private $allowBr = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_template", type="boolean", nullable=false)
     */
    private $allowTemplate = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="grouplevel", type="string", length=100, nullable=false, options={"default"="all"})
     */
    private $grouplevel = 'all';

    /**
     * @var string
     *
     * @ORM\Column(name="tpl", type="string", length=40, nullable=false)
     */
    private $tpl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="metadescr", type="string", length=200, nullable=false)
     */
    private $metadescr = '';

    /**
     * @var string
     *
     * @ORM\Column(name="metakeys", type="text", length=65535, nullable=false)
     */
    private $metakeys;

    /**
     * @var int
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="template_folder", type="string", length=50, nullable=false)
     */
    private $templateFolder = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $date = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metatitle", type="string", length=255, nullable=false)
     */
    private $metatitle = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_count", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowCount = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="sitemap", type="boolean", nullable=false, options={"default"="1"})
     */
    private $sitemap = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="disable_index", type="boolean", nullable=false)
     */
    private $disableIndex = '0';


}
