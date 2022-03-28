<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Skills
 *
 * @ORM\Table(name="skills")
 * @ORM\Entity(repositoryClass="App\Repository\skillsRepository")

 */
class Skills
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_skill", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSkill;

    /**
     * @var string
     *
     * @ORM\Column(name="Skill_Name", type="string", length=50, nullable=false)
     */
    private $skillName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offer", inversedBy="idSkill")
     * @ORM\JoinTable(name="need",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_skill", referencedColumnName="ID_skill")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_offer", referencedColumnName="ID_offer")
     *   }
     * )
     */
    private $idOffer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idOffer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdSkill(): ?int
    {
        return $this->idSkill;
    }

    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(string $skillName): self
    {
        $this->skillName = $skillName;

        return $this;
    }

    /**
     * @return Collection<int, Offer>
     */
    public function getIdOffer(): Collection
    {
        return $this->idOffer;
    }

    public function addIdOffer(Offer $idOffer): self
    {
        if (!$this->idOffer->contains($idOffer)) {
            $this->idOffer[] = $idOffer;
        }

        return $this;
    }

    public function removeIdOffer(Offer $idOffer): self
    {
        $this->idOffer->removeElement($idOffer);

        return $this;
    }

}
