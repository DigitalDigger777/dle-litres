<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LitresGenresRelation
 *
 * @ORM\Table(name="litres_genres_relation", uniqueConstraints={@ORM\UniqueConstraint(name="litres_token", columns={"litres_token"})}, indexes={@ORM\Index(name="order", columns={"order"}), @ORM\Index(name="local_category", columns={"local_category"}), @ORM\Index(name="parent_genre_title", columns={"parent_genre_title"})})
 * @ORM\Entity
 */
class LitresGenresRelation
{
    /**
     * @var int
     *
     * @ORM\Column(name="genre_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $genreId;

    /**
     * @var string
     *
     * @ORM\Column(name="litres_token", type="string", length=50, nullable=false, options={"fixed"=true})
     */
    private $litresToken;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=300, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="parent_genre_title", type="string", length=300, nullable=false)
     */
    private $parentGenreTitle;

    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", nullable=false)
     */
    private $order;

    /**
     * @var int
     *
     * @ORM\Column(name="local_category", type="smallint", nullable=false)
     */
    private $localCategory;


}
