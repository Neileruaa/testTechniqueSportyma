<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=SeasonRepository::class)
 * @Gedmo\Loggable
 */
class Season
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTime $start;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTime $end;

    /**
     * @ORM\OneToMany(targetEntity=PlayerSeasonClub::class, mappedBy="season")
     * @Gedmo\Versioned
     */
    private $playerSeasonClubs;

    public function __toString()
    {
        return $this->start->format("Y") . "/" . $this->end->format("Y");
    }

    public function __construct()
    {
        $this->playerSeasonClubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    /**
     * @return Collection|PlayerSeasonClub[]
     */
    public function getPlayerSeasonClubs(): Collection
    {
        return $this->playerSeasonClubs;
    }

    public function addPlayerSeasonClub(PlayerSeasonClub $playerSeasonClub): self
    {
        if (!$this->playerSeasonClubs->contains($playerSeasonClub)) {
            $this->playerSeasonClubs[] = $playerSeasonClub;
            $playerSeasonClub->setSeason($this);
        }

        return $this;
    }

    public function removePlayerSeasonClub(PlayerSeasonClub $playerSeasonClub): self
    {
        if ($this->playerSeasonClubs->removeElement($playerSeasonClub)) {
            // set the owning side to null (unless already changed)
            if ($playerSeasonClub->getSeason() === $this) {
                $playerSeasonClub->setSeason(null);
            }
        }

        return $this;
    }
}
