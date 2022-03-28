<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="App\Repository\addressRepository")
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_addr", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAddr;

    /**
     * @var int
     *
     * @ORM\Column(name="Postcode", type="integer", nullable=false)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="Street", type="string", length=50, nullable=false)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="Number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Company", inversedBy="idAddr")
     * @ORM\JoinTable(name="placed_at",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_addr", referencedColumnName="ID_addr")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_comp", referencedColumnName="ID_comp")
     *   }
     * )
     */
    private $idComp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idComp = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdAddr(): ?int
    {
        return $this->idAddr;
    }

    public function getPostcode(): ?int
    {
        return $this->postcode;
    }

    public function setPostcode(int $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, Company>
     */
    public function getIdComp(): Collection
    {
        return $this->idComp;
    }

    public function addIdComp(Company $idComp): self
    {
        if (!$this->idComp->contains($idComp)) {
            $this->idComp[] = $idComp;
        }

        return $this;
    }

    public function removeIdComp(Company $idComp): self
    {
        $this->idComp->removeElement($idComp);

        return $this;
    }

}
