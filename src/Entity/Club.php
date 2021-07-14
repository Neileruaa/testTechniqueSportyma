<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 * @Gedmo\Loggable
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Gedmo\Versioned
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Versioned
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=PlayerSeasonClub::class, mappedBy="club")
     * @Gedmo\Versioned
     */
    private $playerSeasonClubs;

    /**
     * @ORM\OneToOne(targetEntity=Logo::class, mappedBy="club", cascade={"persist", "remove"})
     * @Gedmo\Versioned
     */
    private $logo;

    public function __construct()
    {
        $this->playerSeasonClubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $playerSeasonClub->setClub($this);
        }

        return $this;
    }

    public function removePlayerSeasonClub(PlayerSeasonClub $playerSeasonClub): self
    {
        if ($this->playerSeasonClubs->removeElement($playerSeasonClub)) {
            // set the owning side to null (unless already changed)
            if ($playerSeasonClub->getClub() === $this) {
                $playerSeasonClub->setClub(null);
            }
        }

        return $this;
    }

    public function getLogo(): ?Logo
    {
        return $this->logo;
    }

    public function setLogo(?Logo $logo): self
    {
        // unset the owning side of the relation if necessary
        if ($logo === null && $this->logo !== null) {
            $this->logo->setClub(null);
        }

        // set the owning side of the relation if necessary
        if ($logo !== null && $logo->getClub() !== $this) {
            $logo->setClub($this);
        }

        $this->logo = $logo;

        return $this;
    }
}
