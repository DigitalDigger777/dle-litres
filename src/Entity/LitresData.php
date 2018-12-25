<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LitresData
 *
 * @ORM\Table(name="litres_data", indexes={@ORM\Index(name="author_name", columns={"author_name"}), @ORM\Index(name="must_import", columns={"must_import"}), @ORM\Index(name="book_title", columns={"book_title"}), @ORM\Index(name="litres_url", columns={"litres_url"}), @ORM\Index(name="global_book_id", columns={"global_book_id"}), @ORM\Index(name="author_name_2", columns={"author_name", "author_sname"}), @ORM\Index(name="second_author_sname", columns={"second_author_sname"}), @ORM\Index(name="has_trial", columns={"has_trial"}), @ORM\Index(name="vk_txt_doc_id", columns={"vk_txt_doc_id"}), @ORM\Index(name="vk_txt_doc_id_public_status", columns={"vk_doc_id_public_status"}), @ORM\Index(name="author_sname", columns={"author_sname"}), @ORM\Index(name="you_can_sell", columns={"you_can_sell"}), @ORM\Index(name="genre", columns={"genre"}), @ORM\Index(name="book_title_2", columns={"book_title"}), @ORM\Index(name="second_author_name", columns={"second_author_name"}), @ORM\Index(name="vk_doc_id", columns={"vk_fb2_doc_id"}), @ORM\Index(name="vk_rtf_doc_id", columns={"vk_rtf_doc_id"})})
 * @ORM\Entity
 */
class LitresData
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
     * @ORM\Column(name="hub_id", type="integer", nullable=false)
     */
    private $hubId;

    /**
     * @var string
     *
     * @ORM\Column(name="litres_url", type="string", length=300, nullable=false, options={"comment"="чпу книги"})
     */
    private $litresUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="litres_id", type="integer", nullable=true, options={"unsigned"=true,"comment"="id книги на литресе (по нему выцепляем обложку с литреса)"})
     */
    private $litresId;

    /**
     * @var int
     *
     * @ORM\Column(name="hub_author_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hubAuthorId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="litres_a_url", type="string", length=100, nullable=true, options={"comment"="чпу автора"})
     */
    private $litresAUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="local_book_id", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $localBookId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="local_book_id_litres_catalog", type="integer", nullable=true, options={"unsigned"=true,"comment"="id локальной книги из отедльного литресного каталога на сайте"})
     */
    private $localBookIdLitresCatalog;

    /**
     * @var string
     *
     * @ORM\Column(name="global_book_id", type="string", length=200, nullable=false)
     */
    private $globalBookId;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_trial", type="boolean", nullable=false)
     */
    private $hasTrial = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mybook_book_url", type="string", length=200, nullable=true, options={"comment"="чпу книги на mybook"})
     */
    private $mybookBookUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vk_fb2_doc_id", type="integer", nullable=true)
     */
    private $vkFb2DocId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vk_rtf_doc_id", type="integer", nullable=true)
     */
    private $vkRtfDocId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vk_txt_doc_id", type="integer", nullable=true)
     */
    private $vkTxtDocId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vk_epub_doc_id", type="integer", nullable=true)
     */
    private $vkEpubDocId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="vk_doc_id_public_status", type="boolean", nullable=true)
     */
    private $vkDocIdPublicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name", type="string", length=200, nullable=false)
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="author_sname", type="string", length=200, nullable=false)
     */
    private $authorSname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="litres_a_rod", type="string", length=300, nullable=true, options={"comment"="род падеж автора"})
     */
    private $litresARod;

    /**
     * @var int
     *
     * @ORM\Column(name="author_lvl", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $authorLvl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="second_author_name", type="string", length=200, nullable=true)
     */
    private $secondAuthorName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="second_author_sname", type="string", length=200, nullable=true)
     */
    private $secondAuthorSname;

    /**
     * @var string
     *
     * @ORM\Column(name="book_title", type="string", length=300, nullable=false)
     */
    private $bookTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=100, nullable=false, options={"fixed"=true})
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="genre_names", type="string", length=500, nullable=false)
     */
    private $genreNames;

    /**
     * @var int
     *
     * @ORM\Column(name="options", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $options;

    /**
     * @var bool
     *
     * @ORM\Column(name="must_import", type="boolean", nullable=false)
     */
    private $mustImport;

    /**
     * @var int
     *
     * @ORM\Column(name="you_can_sell", type="smallint", nullable=false)
     */
    private $youCanSell;

    /**
     * @var int|null
     *
     * @ORM\Column(name="can_preorder", type="integer", nullable=true)
     */
    private $canPreorder;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=4, nullable=false, options={"fixed"=true})
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="smallint", nullable=false, options={"unsigned"=true,"comment"="0-книги, 1-аудиокниги"})
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="annotation", type="string", length=3000, nullable=false)
     */
    private $annotation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cover_ext", type="string", length=4, nullable=true, options={"fixed"=true})
     */
    private $coverExt;

    /**
     * @var string
     *
     * @ORM\Column(name="contract_title", type="string", length=400, nullable=false)
     */
    private $contractTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=100, nullable=false)
     */
    private $publisher;

    /**
     * @var int
     *
     * @ORM\Column(name="publ_year", type="smallint", nullable=false)
     */
    private $publYear;

    /**
     * @var string
     *
     * @ORM\Column(name="reteller", type="string", length=200, nullable=false)
     */
    private $reteller;

    /**
     * @var string
     *
     * @ORM\Column(name="reader", type="string", length=200, nullable=false)
     */
    private $reader;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_date", type="datetime", nullable=false)
     */
    private $releaseDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_written", type="date", nullable=true)
     */
    private $dateWritten;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false, options={"comment"="поле updated из xml потока, для правильного забора кусков данных"})
     */
    private $updated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inserted", type="datetime", nullable=false)
     */
    private $dateInserted;

    /**
     * @param int $hubId
     */
    public function setHubId($hubId)
    {
        $this->hubId = $hubId;
    }

    /**
     * @param string $litresUrl
     */
    public function setLitresUrl($litresUrl)
    {
        $this->litresUrl = $litresUrl;
    }

    /**
     * @param int|null $litresId
     */
    public function setLitresId($litresId)
    {
        $this->litresId = $litresId;
    }

    /**
     * @param int $hubAuthorId
     */
    public function setHubAuthorId($hubAuthorId)
    {
        $this->hubAuthorId = $hubAuthorId;
    }

    /**
     * @param null|string $litresAUrl
     */
    public function setLitresAUrl($litresAUrl)
    {
        $this->litresAUrl = $litresAUrl;
    }

    /**
     * @param int|null $localBookId
     */
    public function setLocalBookId($localBookId)
    {
        $this->localBookId = $localBookId;
    }

    /**
     * @param int|null $localBookIdLitresCatalog
     */
    public function setLocalBookIdLitresCatalog($localBookIdLitresCatalog)
    {
        $this->localBookIdLitresCatalog = $localBookIdLitresCatalog;
    }

    /**
     * @param string $globalBookId
     */
    public function setGlobalBookId($globalBookId)
    {
        $this->globalBookId = $globalBookId;
    }

    /**
     * @param bool $hasTrial
     */
    public function setHasTrial($hasTrial)
    {
        $this->hasTrial = $hasTrial;
    }

    /**
     * @param null|string $mybookBookUrl
     */
    public function setMybookBookUrl($mybookBookUrl)
    {
        $this->mybookBookUrl = $mybookBookUrl;
    }

    /**
     * @param int|null $vkFb2DocId
     */
    public function setVkFb2DocId($vkFb2DocId)
    {
        $this->vkFb2DocId = $vkFb2DocId;
    }

    /**
     * @param int|null $vkRtfDocId
     */
    public function setVkRtfDocId($vkRtfDocId)
    {
        $this->vkRtfDocId = $vkRtfDocId;
    }

    /**
     * @param int|null $vkTxtDocId
     */
    public function setVkTxtDocId($vkTxtDocId)
    {
        $this->vkTxtDocId = $vkTxtDocId;
    }

    /**
     * @param int|null $vkEpubDocId
     */
    public function setVkEpubDocId($vkEpubDocId)
    {
        $this->vkEpubDocId = $vkEpubDocId;
    }

    /**
     * @param bool|null $vkDocIdPublicStatus
     */
    public function setVkDocIdPublicStatus($vkDocIdPublicStatus)
    {
        $this->vkDocIdPublicStatus = $vkDocIdPublicStatus;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @param string $authorSname
     */
    public function setAuthorSname($authorSname)
    {
        $this->authorSname = $authorSname;
    }

    /**
     * @param null|string $litresARod
     */
    public function setLitresARod($litresARod)
    {
        $this->litresARod = $litresARod;
    }

    /**
     * @param int $authorLvl
     */
    public function setAuthorLvl($authorLvl)
    {
        $this->authorLvl = $authorLvl;
    }

    /**
     * @param null|string $secondAuthorName
     */
    public function setSecondAuthorName($secondAuthorName)
    {
        $this->secondAuthorName = $secondAuthorName;
    }

    /**
     * @param null|string $secondAuthorSname
     */
    public function setSecondAuthorSname($secondAuthorSname)
    {
        $this->secondAuthorSname = $secondAuthorSname;
    }

    /**
     * @param string $bookTitle
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @param string $genreNames
     */
    public function setGenreNames($genreNames)
    {
        $this->genreNames = $genreNames;
    }

    /**
     * @param int $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @param bool $mustImport
     */
    public function setMustImport($mustImport)
    {
        $this->mustImport = $mustImport;
    }

    /**
     * @param int $youCanSell
     */
    public function setYouCanSell($youCanSell)
    {
        $this->youCanSell = $youCanSell;
    }

    /**
     * @param int|null $canPreorder
     */
    public function setCanPreorder($canPreorder)
    {
        $this->canPreorder = $canPreorder;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

    /**
     * @param null|string $coverExt
     */
    public function setCoverExt($coverExt)
    {
        $this->coverExt = $coverExt;
    }

    /**
     * @param string $contractTitle
     */
    public function setContractTitle($contractTitle)
    {
        $this->contractTitle = $contractTitle;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @param int $publYear
     */
    public function setPublYear($publYear)
    {
        $this->publYear = $publYear;
    }

    /**
     * @param string $reteller
     */
    public function setReteller($reteller)
    {
        $this->reteller = $reteller;
    }

    /**
     * @param string $reader
     */
    public function setReader($reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @param \DateTime|null $dateWritten
     */
    public function setDateWritten($dateWritten)
    {
        $this->dateWritten = $dateWritten;
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @param \DateTime $dateInserted
     */
    public function setDateInserted($dateInserted)
    {
        $this->dateInserted = $dateInserted;
    }
}
