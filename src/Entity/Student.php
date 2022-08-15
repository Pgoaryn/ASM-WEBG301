<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    private $courseName;

    #[ORM\ManyToOne(targetEntity: Major::class, inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private $majorName;

    #[ORM\ManyToOne(targetEntity: Classes::class, inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private $className;

    public function __construct()
    {
        $this->courseName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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

    /**
     * @return Collection<int, Course>
     */
    public function getCourseName(): Collection
    {
        return $this->courseName;
    }

    public function addCourseName(Course $courseName): self
    {
        if (!$this->courseName->contains($courseName)) {
            $this->courseName[] = $courseName;
        }

        return $this;
    }

    public function removeCourseName(Course $courseName): self
    {
        $this->courseName->removeElement($courseName);

        return $this;
    }

    public function getMajorName(): ?Major
    {
        return $this->majorName;
    }

    public function setMajorName(?Major $majorName): self
    {
        $this->majorName = $majorName;

        return $this;
    }

    public function getClassName(): ?Classes
    {
        return $this->className;
    }

    public function setClassName(?Classes $className): self
    {
        $this->className = $className;

        return $this;
    }
}
