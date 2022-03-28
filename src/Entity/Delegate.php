<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Delegate
 *
 * @ORM\Table(name="delegate", indexes={@ORM\Index(name="delegate_users_FK", columns={"ID_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\delegateRepository")
 */
class Delegate
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_delegate", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDelegate;

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
     * @ORM\ManyToMany(targetEntity="Centers", mappedBy="idDelegate")
     */
    private $idCenter;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCenter = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdDelegate(): ?int
    {
        return $this->idDelegate;
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
     * @return Collection<int, Centers>
     */
    public function getIdCenter(): Collection
    {
        return $this->idCenter;
    }

    public function addIdCenter(Centers $idCenter): self
    {
        if (!$this->idCenter->contains($idCenter)) {
            $this->idCenter[] = $idCenter;
            $idCenter->addIdDelegate($this);
        }

        return $this;
    }

    public function removeIdCenter(Centers $idCenter): self
    {
        if ($this->idCenter->removeElement($idCenter)) {
            $idCenter->removeIdDelegate($this);
        }

        return $this;
    }

}
