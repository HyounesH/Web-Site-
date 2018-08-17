<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeDevisRepository")
 */
class DemandeDevis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomSociete;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Assert\Regex(pattern="/^0[567][0-9]{8}$/", message="le numéro de télephone n'est pas valide")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255) 
     * @Assert\Email(
     * message = "'{{ value }}' n'est pas valide .",
     * checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="uploaded demande de devis et essayer une autre fois")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $fichier;

    /**
     * @ORM\Column(type="boolean")
     */
    private $conditionUtilisation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $recevoirOffrEmail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->NomSociete;
    }

    public function setNomSociete(string $NomSociete): self
    {
        $this->NomSociete = $NomSociete;

        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getConditionUtilisation(): ?bool
    {
        return $this->conditionUtilisation;
    }

    public function setConditionUtilisation(bool $conditionUtilisation): self
    {
        $this->conditionUtilisation = $conditionUtilisation;

        return $this;
    }

    public function getRecevoirOffrEmail(): ?bool
    {
        return $this->recevoirOffrEmail;
    }

    public function setRecevoirOffrEmail(bool $recevoirOffrEmail): self
    {
        $this->recevoirOffrEmail = $recevoirOffrEmail;

        return $this;
    }
}
