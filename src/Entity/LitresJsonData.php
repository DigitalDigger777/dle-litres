<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LitresJsonDataRepository")
 * @ORM\Table(indexes={@ORM\Index(name="hub_id_idx", columns={"hub_id"})})
 */
class LitresJsonData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $hub_id;

    /**
     * @ORM\Column(type="string")
     */
    private $external_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $local_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $you_can_sell;

    /**
     * @ORM\Column(type="datetime")
     */
    private $last_release;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @ORM\Column(type="json_array")
     */
    private $data;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $need_local_update;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHubId(): ?int
    {
        return $this->hub_id;
    }

    public function setHubId(int $hub_id): self
    {
        $this->hub_id = $hub_id;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->external_id;
    }

    public function setExternalId(string $external_id): self
    {
        $this->external_id = $external_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->local_id;
    }

    /**
     * @param mixed $local_id
     */
    public function setLocalId($local_id)
    {
        $this->local_id = $local_id;
    }

    public function getYouCanSell(): ?int
    {
        return $this->you_can_sell;
    }

    public function setYouCanSell(int $you_can_sell): self
    {
        $this->you_can_sell = $you_can_sell;

        return $this;
    }

    public function getLastRelease(): ?\DateTimeInterface
    {
        return $this->last_release;
    }

    public function setLastRelease(\DateTimeInterface $last_release): self
    {
        $this->last_release = $last_release;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNeedLocalUpdate()
    {
        return $this->need_local_update;
    }

    /**
     * @param mixed $need_local_update
     */
    public function setNeedLocalUpdate($need_local_update)
    {
        $this->need_local_update = $need_local_update;
    }
}
