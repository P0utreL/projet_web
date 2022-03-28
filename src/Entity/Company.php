<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="App\Repository\companyRepository")
 */
class Company
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_comp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComp;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_comp", type="string", length=50, nullable=false)
     */
    private $nameComp;

    /**
     * @var string
     *
     * @ORM\Column(name="Sector", type="string", length=50, nullable=false)
     */
    private $sector;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbr_CESI_interns", type="integer", nullable=false)
     */
    private $nbrCesiInterns;

    /**
     * @var string
     *
     * @ORM\Column(name="Grade_student", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $gradeStudent;

    /**
     * @var string
     *
     * @ORM\Column(name="Grade_pilot", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $gradePilot;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Address", mappedBy="idComp")
     */
    private $idAddr;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAddr = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdComp(): ?int
    {
        return $this->idComp;
    }

    public function getNameComp(): ?string
    {
        return $this->nameComp;
    }

    public function setNameComp(string $nameComp): self
    {
        $this->nameComp = $nameComp;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getNbrCesiInterns(): ?int
    {
        return $this->nbrCesiInterns;
    }

    public function setNbrCesiInterns(int $nbrCesiInterns): self
    {
        $this->nbrCesiInterns = $nbrCesiInterns;

        return $this;
    }

    public function getGradeStudent(): ?string
    {
        return $this->gradeStudent;
    }

    public function setGradeStudent(string $gradeStudent): self
    {
        $this->gradeStudent = $gradeStudent;

        return $this;
    }

    public function getGradePilot(): ?string
    {
        return $this->gradePilot;
    }

    public function setGradePilot(string $gradePilot): self
    {
        $this->gradePilot = $gradePilot;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getIdAddr(): Collection
    {
        return $this->idAddr;
    }

    public function addIdAddr(Address $idAddr): self
    {
        if (!$this->idAddr->contains($idAddr)) {
            $this->idAddr[] = $idAddr;
            $idAddr->addIdComp($this);
        }

        return $this;
    }

    public function removeIdAddr(Address $idAddr): self
    {
        if ($this->idAddr->removeElement($idAddr)) {
            $idAddr->removeIdComp($this);
        }

        return $this;
    }

}
