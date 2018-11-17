<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommanderFournituresRepository")
 */
class CommanderFournitures
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
    private $nom;

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
     * @Assert\Regex(pattern="/^0[567][0-9]{8}$/", message="le numéro de télephone n'est pas valide")
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbrCommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $institut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $livres;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cahiers;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fournitures;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmationCondition;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $recevoirOffres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNbrCommande(): ?int
    {
        return $this->NbrCommande;
    }

    public function setNbrCommande(int $NbrCommande): self
    {
        $this->NbrCommande = $NbrCommande;

        return $this;
    }

    public function getInstitut(): ?string
    {
        return $this->institut;
    }

    public function setInstitut(string $institut): self
    {
        $this->institut = $institut;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getLivres(): ?bool
    {
        return $this->livres;
    }

    public function setLivres(?bool $livres): self
    {
        $this->livres = $livres;

        return $this;
    }

    public function getCahiers(): ?bool
    {
        return $this->cahiers;
    }

    public function setCahiers(?bool $cahiers): self
    {
        $this->cahiers = $cahiers;

        return $this;
    }

    public function getFournitures(): ?bool
    {
        return $this->fournitures;
    }

    public function setFournitures(?bool $fournitures): self
    {
        $this->fournitures = $fournitures;

        return $this;
    }

    public function getConfirmationCondition(): ?bool
    {
        return $this->confirmationCondition;
    }

    public function setConfirmationCondition(bool $confirmationCondition): self
    {
        $this->confirmationCondition = $confirmationCondition;

        return $this;
    }

    public function getRecevoirOffres(): ?bool
    {
        return $this->recevoirOffres;
    }

    public function setRecevoirOffres(?bool $recevoirOffres): self
    {
        $this->recevoirOffres = $recevoirOffres;

        return $this;
    }
}
