<?php

namespace App\Entity;

use App\Repository\TrickImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TrickImageRepository::class)
 */
class TrickImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mediaName;

    /**
     * @Assert\Image(mimeTypes = {"image/jpeg", "image/jpg", "image/png"}, mimeTypesMessage = "Format invalide")
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity=Trick::class, inversedBy="trickImages")
     */
    private $trick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaName(): ?string
    {
        return $this->mediaName;
    }

    public function setMediaName(string $mediaName): self
    {
        $this->mediaName = $mediaName;

        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }

}
