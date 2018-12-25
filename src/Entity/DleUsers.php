<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DleUsers
 *
 * @ORM\Table(name="dle_users", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"}), @ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
class DleUsers
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name = '';

    /**
     * @var int
     *
     * @ORM\Column(name="news_num", type="integer", nullable=false)
     */
    private $newsNum = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="comm_num", type="integer", nullable=false)
     */
    private $commNum = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="user_group", type="smallint", nullable=false, options={"default"="4"})
     */
    private $userGroup = '4';

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastdate", type="string", length=20, nullable=true)
     */
    private $lastdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reg_date", type="string", length=20, nullable=true)
     */
    private $regDate;

    /**
     * @var string
     *
     * @ORM\Column(name="banned", type="string", length=5, nullable=false)
     */
    private $banned = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_mail", type="boolean", nullable=false, options={"default"="1"})
     */
    private $allowMail = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", length=65535, nullable=false)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="text", length=65535, nullable=false)
     */
    private $signature;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=false)
     */
    private $foto = '';

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=100, nullable=false)
     */
    private $fullname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="land", type="string", length=100, nullable=false)
     */
    private $land = '';

    /**
     * @var string
     *
     * @ORM\Column(name="favorites", type="text", length=65535, nullable=false)
     */
    private $favorites;

    /**
     * @var int
     *
     * @ORM\Column(name="pm_all", type="smallint", nullable=false)
     */
    private $pmAll = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="pm_unread", type="smallint", nullable=false)
     */
    private $pmUnread = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="time_limit", type="string", length=20, nullable=false)
     */
    private $timeLimit = '';

    /**
     * @var string
     *
     * @ORM\Column(name="xfields", type="text", length=65535, nullable=false)
     */
    private $xfields;

    /**
     * @var string
     *
     * @ORM\Column(name="allowed_ip", type="string", length=255, nullable=false)
     */
    private $allowedIp = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=32, nullable=false)
     */
    private $hash = '';

    /**
     * @var string
     *
     * @ORM\Column(name="logged_ip", type="string", length=40, nullable=false)
     */
    private $loggedIp = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="restricted", type="boolean", nullable=false)
     */
    private $restricted = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="restricted_days", type="smallint", nullable=false)
     */
    private $restrictedDays = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="restricted_date", type="string", length=15, nullable=false)
     */
    private $restrictedDate = '';

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=100, nullable=false)
     */
    private $timezone = '';


}
