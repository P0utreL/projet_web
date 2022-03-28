<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 *
 * @ORM\Table(name="offer", indexes={@ORM\Index(name="offer_company_FK", columns={"ID_comp"})})
 * @ORM\Entity(repositoryClass="App\Repository\offerRepository")
 */
class Offer
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_offer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffer;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_offer", type="string", length=50, nullable=false)
     */
    private $nameOffer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Duration", type="date", nullable=false)
     */
    private $duration;

    /**
     * @var float
     *
     * @ORM\Column(name="Revenue_Base", type="float", precision=10, scale=0, nullable=false)
     */
    private $revenueBase;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_creation", type="date", nullable=false)
     */
    private $dateCreation;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbr_places", type="integer", nullable=false)
     */
    private $nbrPlaces;

    /**
     * @var int
     *
     * @ORM\Column(name="State", type="integer", nullable=false)
     */
    private $state;

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_comp", referencedColumnName="ID_comp")
     * })
     */
    private $idComp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Students", inversedBy="idOffer")
     * @ORM\JoinTable(name="apply",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_offer", referencedColumnName="ID_offer")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_student", referencedColumnName="ID_student")
     *   }
     * )
     */
    private $idStudent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Skills", mappedBy="idOffer")
     */
    private $idSkill;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idStudent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idSkill = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdOffer(): ?int
    {
        return $this->idOffer;
    }

    public function getNameOffer(): ?string
    {
        return $this->nameOffer;
    }

    public function setNameOffer(string $nameOffer): self
    {
        $this->nameOffer = $nameOffer;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getRevenueBase(): ?float
    {
        return $this->revenueBase;
    }

    public function setRevenueBase(float $revenueBase): self
    {
        $this->revenueBase = $revenueBase;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getNbrPlaces(): ?int
    {
        return $this->nbrPlaces;
    }

    public function setNbrPlaces(int $nbrPlaces): self
    {
        $this->nbrPlaces = $nbrPlaces;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getIdComp(): ?Company
    {
        return $this->idComp;
    }

    public function setIdComp(?Company $idComp): self
    {
        $this->idComp = $idComp;

        return $this;
    }

    /**
     * @return Collection<int, Students>
     */
    public function getIdStudent(): Collection
    {
        return $this->idStudent;
    }

    public function addIdStudent(Students $idStudent): self
    {
        if (!$this->idStudent->contains($idStudent)) {
            $this->idStudent[] = $idStudent;
        }

        return $this;
    }

    public function removeIdStudent(Students $idStudent): self
    {
        $this->idStudent->removeElement($idStudent);

        return $this;
    }

    /**
     * @return Collection<int, Skills>
     */
    public function getIdSkill(): Collection
    {
        return $this->idSkill;
    }

    public function addIdSkill(Skills $idSkill): self
    {
        if (!$this->idSkill->contains($idSkill)) {
            $this->idSkill[] = $idSkill;
            $idSkill->addIdOffer($this);
        }

        return $this;
    }

    public function removeIdSkill(Skills $idSkill): self
    {
        if ($this->idSkill->removeElement($idSkill)) {
            $idSkill->removeIdOffer($this);
        }

        return $this;
    }

}
