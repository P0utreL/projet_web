<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeUser
 *
 * @ORM\Table(name="type_user")
 * @ORM\Entity(repositoryClass="App\Repository\type_useRepository")

 */
class TypeUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idType;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_Type", type="string", length=50, nullable=false)
     */
    private $nameType;

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function getNameType(): ?string
    {
        return $this->nameType;
    }

    public function setNameType(string $nameType): self
    {
        $this->nameType = $nameType;

        return $this;
    }


}
