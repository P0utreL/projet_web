<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proms
 *
 * @ORM\Table(name="proms", indexes={@ORM\Index(name="proms_Pilot_FK", columns={"ID_pilot"}), @ORM\Index(name="proms_centers0_FK", columns={"ID_center"})})
 * @ORM\Entity(repositoryClass="App\Repository\promsRepository")
 */
class Proms
{
    /**
     * @var string
     *
     * @ORM\Column(name="ID_prom", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProm;

    /**
     * @var \Pilot
     *
     * @ORM\ManyToOne(targetEntity="Pilot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_pilot", referencedColumnName="ID_pilot")
     * })
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

    public function getIdProm(): ?string
    {
        return $this->idProm;
    }

    public function getIdPilot(): ?Pilot
    {
        return $this->idPilot;
    }

    public function setIdPilot(?Pilot $idPilot): self
    {
        $this->idPilot = $idPilot;

        return $this;
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


}
