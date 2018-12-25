<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleBooks
 *
 * @ORM\Table(name="dle_books", indexes={@ORM\Index(name="last_name", columns={"book_author_last_name"}), @ORM\Index(name="first_name", columns={"book_author_first_name"}), @ORM\Index(name="fio", columns={"book_author_first_name", "book_author_last_name", "book_author_middle_name"})})
 * @ORM\Entity
 */
class DleBooks
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
     * @var string|null
     *
     * @ORM\Column(name="full_story", type="blob", length=16777215, nullable=true)
     */
    private $fullStory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_title", type="string", length=250, nullable=true, options={"fixed"=true})
     */
    private $bookTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_date", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $bookDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_genre", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $bookGenre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_author_first_name", type="string", length=60, nullable=true, options={"fixed"=true})
     */
    private $bookAuthorFirstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_author_last_name", type="string", length=60, nullable=true, options={"fixed"=true})
     */
    private $bookAuthorLastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_author_middle_name", type="string", length=60, nullable=true, options={"fixed"=true})
     */
    private $bookAuthorMiddleName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_publisher", type="string", length=255, nullable=true, options={"fixed"=true})
     */
    private $bookPublisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_isbn", type="string", length=150, nullable=true, options={"fixed"=true})
     */
    private $bookIsbn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_year", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $bookYear;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_city", type="string", length=100, nullable=true, options={"fixed"=true})
     */
    private $bookCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_annotation", type="blob", length=65535, nullable=true)
     */
    private $bookAnnotation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_cover", type="text", length=65535, nullable=true)
     */
    private $bookCover;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_description", type="blob", length=65535, nullable=true)
     */
    private $bookDescription;


}
