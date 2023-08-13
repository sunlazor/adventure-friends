<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Adventurer::class, inversedBy: 'tags')]
    private Collection $adventurer;

    #[ORM\Column(length: 64)]
    private ?string $title = null;

    #[ORM\Column(length: 64)]
    private ?string $aspect = null;

    public function __construct()
    {
        $this->adventurer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Adventurer>
     */
    public function getAdventurer(): Collection
    {
        return $this->adventurer;
    }

    public function addAdventurer(Adventurer $adventurer): static
    {
        if (!$this->adventurer->contains($adventurer)) {
            $this->adventurer->add($adventurer);
        }

        return $this;
    }

    public function removeAdventurer(Adventurer $adventurer): static
    {
        $this->adventurer->removeElement($adventurer);

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAspect(): ?string
    {
        return $this->aspect;
    }

    public function setAspect(?string $aspect): void
    {
        $this->aspect = $aspect;
    }
}
