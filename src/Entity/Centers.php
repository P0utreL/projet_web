<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Centers
 *
 * @ORM\Table(name="centers", indexes={@ORM\Index(name="centers_address_FK", columns={"ID_addr"})})
 * @ORM\Entity(repositoryClass="App\Repository\centersRepository")
 */
class Centers
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_center", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCenter;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_center", type="string", length=50, nullable=false)
     */
    private $nomCenter;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_addr", referencedColumnName="ID_addr")
     * })
     */
    private $idAddr;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Delegate", inversedBy="idCenter")
     * @ORM\JoinTable(name="from_center_de",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_center", referencedColumnName="ID_center")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_delegate", referencedColumnName="ID_delegate")
     *   }
     * )
     */
    private $idDelegate;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idDelegate = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCenter(): ?int
    {
        return $this->idCenter;
    }

    public function getNomCenter(): ?string
    {
        return $this->nomCenter;
    }

    public function setNomCenter(string $nomCenter): self
    {
        $this->nomCenter = $nomCenter;

        return $this;
    }

    public function getIdAddr(): ?Address
    {
        return $this->idAddr;
    }

    public function setIdAddr(?Address $idAddr): self
    {
        $this->idAddr = $idAddr;

        return $this;
    }

    /**
     * @return Collection<int, Delegate>
     */
    public function getIdDelegate(): Collection
    {
        return $this->idDelegate;
    }

    public function addIdDelegate(Delegate $idDelegate): self
    {
        if (!$this->idDelegate->contains($idDelegate)) {
            $this->idDelegate[] = $idDelegate;
        }

        return $this;
    }

    public function removeIdDelegate(Delegate $idDelegate): self
    {
        $this->idDelegate->removeElement($idDelegate);

        return $this;
    }

}
