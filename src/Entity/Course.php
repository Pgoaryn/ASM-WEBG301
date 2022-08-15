<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $info;

    #[ORM\Column(type: 'float')]
    private $attendance;

    #[ORM\Column(type: 'float')]
    private $grade;

    #[ORM\ManyToOne(targetEntity: Semester::class, inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private $courseName;

    #[ORM\ManyToOne(targetEntity: Subject::class, inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private $subjectName;

    #[ORM\ManyToMany(targetEntity: Student::class, mappedBy: 'courseName')]
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getAttendance(): ?float
    {
        return $this->attendance;
    }

    public function setAttendance(float $attendance): self
    {
        $this->attendance = $attendance;

        return $this;
    }

    public function getGrade(): ?float
    {
        return $this->grade;
    }

    public function setGrade(float $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getCourseName(): ?Semester
    {
        return $this->courseName;
    }

    public function setCourseName(?Semester $courseName): self
    {
        $this->courseName = $courseName;

        return $this;
    }

    public function getSubjectName(): ?Subject
    {
        return $this->subjectName;
    }

    public function setSubjectName(?Subject $subjectName): self
    {
        $this->subjectName = $subjectName;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->addCourseName($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            $student->removeCourseName($this);
        }

        return $this;
    }
}
