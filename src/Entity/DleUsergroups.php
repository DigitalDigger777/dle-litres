<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleUsergroups
 *
 * @ORM\Table(name="dle_usergroups")
 * @ORM\Entity
 */
class DleUsergroups
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=32, nullable=false)
     */
    private $groupName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="allow_cats", type="text", length=65535, nullable=false)
     */
    private $allowCats;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_adds", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowAdds = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="cat_add", type="text", length=65535, nullable=false)
     */
    private $catAdd;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_admin", type="boolean", nullable=false)
     */
    private $allowAdmin = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_addc", type="boolean", nullable=false)
     */
    private $allowAddc = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_editc", type="boolean", nullable=false)
     */
    private $allowEditc = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_delc", type="boolean", nullable=false)
     */
    private $allowDelc = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="edit_allc", type="boolean", nullable=false)
     */
    private $editAllc = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="del_allc", type="boolean", nullable=false)
     */
    private $delAllc = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="moderation", type="boolean", nullable=false)
     */
    private $moderation = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_all_edit", type="boolean", nullable=false)
     */
    private $allowAllEdit = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_edit", type="boolean", nullable=false)
     */
    private $allowEdit = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_pm", type="boolean", nullable=false)
     */
    private $allowPm = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_pm", type="smallint", nullable=false)
     */
    private $maxPm = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="max_foto", type="string", length=10, nullable=false)
     */
    private $maxFoto = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_files", type="boolean", nullable=false)
     */
    private $allowFiles = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_hide", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowHide = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_short", type="boolean", nullable=false)
     */
    private $allowShort = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="time_limit", type="boolean", nullable=false)
     */
    private $timeLimit = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rid", type="smallint", nullable=false)
     */
    private $rid = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_fixed", type="boolean", nullable=false)
     */
    private $allowFixed = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_feed", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowFeed = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_search", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowSearch = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_poll", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowPoll = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_main", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowMain = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="captcha", type="boolean", nullable=false)
     */
    private $captcha = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=200, nullable=false)
     */
    private $icon = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_modc", type="boolean", nullable=false)
     */
    private $allowModc = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_rating", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowRating = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_offline", type="boolean", nullable=false)
     */
    private $allowOffline = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_image_upload", type="boolean", nullable=false)
     */
    private $allowImageUpload = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_file_upload", type="boolean", nullable=false)
     */
    private $allowFileUpload = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_signature", type="boolean", nullable=false)
     */
    private $allowSignature = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_url", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowUrl = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="news_sec_code", type="boolean", nullable=false, options={"default"="1"})
     */
    private $newsSecCode = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_image", type="boolean", nullable=false)
     */
    private $allowImage = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_signature", type="smallint", nullable=false)
     */
    private $maxSignature = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_info", type="smallint", nullable=false)
     */
    private $maxInfo = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_addnews", type="boolean", nullable=false)
     */
    private $adminAddnews = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_editnews", type="boolean", nullable=false)
     */
    private $adminEditnews = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_comments", type="boolean", nullable=false)
     */
    private $adminComments = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_categories", type="boolean", nullable=false)
     */
    private $adminCategories = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_editusers", type="boolean", nullable=false)
     */
    private $adminEditusers = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_wordfilter", type="boolean", nullable=false)
     */
    private $adminWordfilter = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_xfields", type="boolean", nullable=false)
     */
    private $adminXfields = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_userfields", type="boolean", nullable=false)
     */
    private $adminUserfields = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_static", type="boolean", nullable=false)
     */
    private $adminStatic = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_editvote", type="boolean", nullable=false)
     */
    private $adminEditvote = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_newsletter", type="boolean", nullable=false)
     */
    private $adminNewsletter = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_blockip", type="boolean", nullable=false)
     */
    private $adminBlockip = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_banners", type="boolean", nullable=false)
     */
    private $adminBanners = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_rss", type="boolean", nullable=false)
     */
    private $adminRss = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_iptools", type="boolean", nullable=false)
     */
    private $adminIptools = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_rssinform", type="boolean", nullable=false)
     */
    private $adminRssinform = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_googlemap", type="boolean", nullable=false)
     */
    private $adminGooglemap = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_html", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowHtml = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="group_prefix", type="text", length=65535, nullable=false)
     */
    private $groupPrefix;

    /**
     * @var string
     *
     * @ORM\Column(name="group_suffix", type="text", length=65535, nullable=false)
     */
    private $groupSuffix;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_subscribe", type="boolean", nullable=false)
     */
    private $allowSubscribe = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_image_size", type="boolean", nullable=false)
     */
    private $allowImageSize = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cat_allow_addnews", type="text", length=65535, nullable=false)
     */
    private $catAllowAddnews;

    /**
     * @var int
     *
     * @ORM\Column(name="flood_news", type="smallint", nullable=false)
     */
    private $floodNews = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_day_news", type="smallint", nullable=false)
     */
    private $maxDayNews = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="force_leech", type="boolean", nullable=false)
     */
    private $forceLeech = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="edit_limit", type="smallint", nullable=false)
     */
    private $editLimit = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="captcha_pm", type="boolean", nullable=false)
     */
    private $captchaPm = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_pm_day", type="smallint", nullable=false)
     */
    private $maxPmDay = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_mail_day", type="smallint", nullable=false)
     */
    private $maxMailDay = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_tagscloud", type="boolean", nullable=false)
     */
    private $adminTagscloud = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_vote", type="boolean", nullable=false)
     */
    private $allowVote = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_complaint", type="boolean", nullable=false)
     */
    private $adminComplaint = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="news_question", type="boolean", nullable=false)
     */
    private $newsQuestion = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="comments_question", type="boolean", nullable=false)
     */
    private $commentsQuestion = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_comment_day", type="smallint", nullable=false)
     */
    private $maxCommentDay = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_images", type="smallint", nullable=false)
     */
    private $maxImages = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_files", type="smallint", nullable=false)
     */
    private $maxFiles = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="disable_news_captcha", type="smallint", nullable=false)
     */
    private $disableNewsCaptcha = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="disable_comments_captcha", type="smallint", nullable=false)
     */
    private $disableCommentsCaptcha = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="pm_question", type="boolean", nullable=false)
     */
    private $pmQuestion = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="captcha_feedback", type="boolean", nullable=false, options={"default"="1"})
     */
    private $captchaFeedback = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="feedback_question", type="boolean", nullable=false)
     */
    private $feedbackQuestion = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="files_type", type="string", length=255, nullable=false)
     */
    private $filesType = '';

    /**
     * @var int
     *
     * @ORM\Column(name="max_file_size", type="integer", nullable=false)
     */
    private $maxFileSize = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="files_max_speed", type="smallint", nullable=false)
     */
    private $filesMaxSpeed = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_lostpassword", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowLostpassword = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="spamfilter", type="boolean", nullable=false, options={"default"="2"})
     */
    private $spamfilter = '2';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_comments_rating", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowCommentsRating = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="max_edit_days", type="boolean", nullable=false)
     */
    private $maxEditDays = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="spampmfilter", type="boolean", nullable=false)
     */
    private $spampmfilter = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="force_reg", type="boolean", nullable=false)
     */
    private $forceReg = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_reg_days", type="integer", nullable=false)
     */
    private $forceRegDays = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_reg_group", type="smallint", nullable=false, options={"default"="4"})
     */
    private $forceRegGroup = '4';

    /**
     * @var bool
     *
     * @ORM\Column(name="force_news", type="boolean", nullable=false)
     */
    private $forceNews = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_news_count", type="integer", nullable=false)
     */
    private $forceNewsCount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_news_group", type="smallint", nullable=false, options={"default"="4"})
     */
    private $forceNewsGroup = '4';

    /**
     * @var bool
     *
     * @ORM\Column(name="force_comments", type="boolean", nullable=false)
     */
    private $forceComments = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_comments_count", type="integer", nullable=false)
     */
    private $forceCommentsCount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_comments_group", type="smallint", nullable=false, options={"default"="4"})
     */
    private $forceCommentsGroup = '4';

    /**
     * @var bool
     *
     * @ORM\Column(name="force_rating", type="boolean", nullable=false)
     */
    private $forceRating = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_rating_count", type="integer", nullable=false)
     */
    private $forceRatingCount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="force_rating_group", type="smallint", nullable=false, options={"default"="4"})
     */
    private $forceRatingGroup = '4';

    /**
     * @var string
     *
     * @ORM\Column(name="not_allow_cats", type="text", length=65535, nullable=false)
     */
    private $notAllowCats;


}
