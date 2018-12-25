<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DlePostExtras
 *
 * @ORM\Table(name="dle_post_extras", indexes={@ORM\Index(name="news_id", columns={"news_id"}), @ORM\Index(name="rating", columns={"rating"}), @ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="news_read", columns={"news_read"})})
 * @ORM\Entity
 */
class DlePostExtras
{
    /**
     * @var int
     *
     * @ORM\Column(name="eid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eid;

    /**
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="news_read", type="integer", nullable=false)
     */
    private $newsRead = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_rate", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowRate = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     */
    private $rating = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="vote_num", type="integer", nullable=false)
     */
    private $voteNum = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="votes", type="boolean", nullable=false)
     */
    private $votes = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="view_edit", type="boolean", nullable=false)
     */
    private $viewEdit = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="disable_index", type="boolean", nullable=false)
     */
    private $disableIndex = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="related_ids", type="string", length=255, nullable=false)
     */
    private $relatedIds = '';

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", length=150, nullable=false)
     */
    private $access = '';

    /**
     * @var int
     *
     * @ORM\Column(name="editdate", type="integer", nullable=false)
     */
    private $editdate = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=40, nullable=false)
     */
    private $editor = '';

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=255, nullable=false)
     */
    private $reason = '';

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="a_born", type="text", length=65535, nullable=true)
     */
    private $aBorn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="a_bio", type="text", length=65535, nullable=true)
     */
    private $aBio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="a_facts", type="text", length=65535, nullable=true)
     */
    private $aFacts;

    /**
     * @var string|null
     *
     * @ORM\Column(name="a_birthday", type="text", length=65535, nullable=true)
     */
    private $aBirthday;

    /**
     * @var string|null
     *
     * @ORM\Column(name="a_photo", type="blob", length=16777215, nullable=true)
     */
    private $aPhoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="a_dead", type="text", length=65535, nullable=true)
     */
    private $aDead;

    /**
     * @var float|null
     *
     * @ORM\Column(name="a_rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $aRating;


}
