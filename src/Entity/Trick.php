<?php

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TrickRepository::class)
 */
class Trick
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message = "Vous devez remplir ce champs.")
     * @Assert\Length(max=255, 
     *                maxMessage = "Le titre ne doit pas dépasser 255 charactères.")
     */
    private $trickName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message = "Vous devez remplir ce champs.")
     * @Assert\Length(min= 10,
     *                minMessage = "La description doit comporter plus de 10 charactères.")
     */
    private $trickDescription;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modifiedAt;

    /**
     * @ORM\ManyToOne(targetEntity=TrickGroup::class, inversedBy="trick")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trickGroup;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="Trick", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tricks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity=TrickImage::class, mappedBy="trick", orphanRemoval=true)
     */
    private $trickImages;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->trickImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrickName(): ?string
    {
        return $this->trickName;
    }

    public function setTrickName(string $trickName): self
    {
        $this->trickName = $trickName;

        return $this;
    }

    public function getTrickDescription(): ?string
    {
        return $this->trickDescription;
    }

    public function setTrickDescription(string $trickDescription): self
    {
        $this->trickDescription = $trickDescription;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getTrickGroup(): ?TrickGroup
    {
        return $this->trickGroup;
    }

    public function setTrickGroup(?TrickGroup $trickGroup): self
    {
        $this->trickGroup = $trickGroup;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setTrick($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTrick() === $this) {
                $comment->setTrick(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->trickName;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection|TrickImage[]
     */
    public function getTrickImages(): Collection
    {
        return $this->trickImages;
    }

    public function addTrickImage(TrickImage $trickImage): self
    {
        if (!$this->trickImages->contains($trickImage)) {
            $this->trickImages[] = $trickImage;
            $trickImage->setTrick($this);
        }

        return $this;
    }

    public function removeTrickImage(TrickImage $trickImage): self
    {
        if ($this->trickImages->removeElement($trickImage)) {
            // set the owning side to null (unless already changed)
            if ($trickImage->getTrick() === $this) {
                $trickImage->setTrick(null);
            }
        }

        return $this;
    }
}
