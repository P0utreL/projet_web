<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pilot
 *
 * @ORM\Table(name="pilot", indexes={@ORM\Index(name="Pilot_centers_FK", columns={"ID_center"}), @ORM\Index(name="Pilot_users0_FK", columns={"ID_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\pilotRepository")
 */
class Pilot
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_pilot", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPilot;

    /**
     * @var \Centers
     *
     * @ORM\ManyToOne(targetEntity="Centers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_center", referencedColumnName="ID_center")
     * })
     */
    private $idCenter;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_user", referencedColumnName="ID_user")
     * })
     */
    private $idUser;

    public function getIdPilot(): ?int
    {
        return $this->idPilot;
    }

    public function getIdCenter(): ?Centers
    {
        return $this->idCenter;
    }

    public function setIdCenter(?Centers $idCenter): self
    {
        $this->idCenter = $idCenter;

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


}
