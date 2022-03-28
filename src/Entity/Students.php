<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Students
 *
 * @ORM\Table(name="students", indexes={@ORM\Index(name="Students_users_FK", columns={"ID_user"}), @ORM\Index(name="Students_proms0_FK", columns={"ID_prom"})})
 * @ORM\Entity(repositoryClass="App\Repository\studentsRepository")

 */
class Students
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_student", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStudent;

    /**
     * @var \Proms
     *
     * @ORM\ManyToOne(targetEntity="Proms")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_prom", referencedColumnName="ID_prom")
     * })
     */
    private $idProm;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_user", referencedColumnName="ID_user")
     * })
     */
    private $idUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offer", mappedBy="idStudent")
     */
    private $idOffer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idOffer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdStudent(): ?int
    {
        return $this->idStudent;
    }

    public function getIdProm(): ?Proms
    {
        return $this->idProm;
    }

    public function setIdProm(?Proms $idProm): self
    {
        $this->idProm = $idProm;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): self
    {
        $this->idUser = $idUser;

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
            $idOffer->addIdStudent($this);
        }

        return $this;
    }

    public function removeIdOffer(Offer $idOffer): self
    {
        if ($this->idOffer->removeElement($idOffer)) {
            $idOffer->removeIdStudent($this);
        }

        return $this;
    }

}
