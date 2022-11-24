<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jobName = null;

    #[ORM\Column(length: 255)]
    private ?string $jobCatagory = null;

    #[ORM\Column(length: 255)]
    private ?string $jobDescription = null;

    #[ORM\Column]
    private ?bool $jobIsactive = null;

    #[ORM\Column]
    private ?int $jobSalary = null;

    #[ORM\Column(length: 255)]
    private ?DateTime $jobPostedDate = null;

    #[ORM\Column(length: 255)]
    private ?string $jobIamge = null;

    #[ORM\Column(length: 255)]
    private ?string $jobLocation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobName(): ?string
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): self
    {
        $this->jobName = $jobName;

        return $this;
    }

    public function getJobCatagory(): ?string
    {
        return $this->jobCatagory;
    }

    public function setJobCatagory(string $jobCatagory): self
    {
        $this->jobCatagory = $jobCatagory;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(string $jobDescription): self
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    public function isJobIsactive(): ?bool
    {
        return $this->jobIsactive;
    }

    public function setJobIsactive(bool $jobIsactive): self
    {
        $this->jobIsactive = $jobIsactive;

        return $this;
    }

    public function getJobSalary(): ?int
    {
        return $this->jobSalary;
    }

    public function setJobSalary(int $jobSalary): self
    {
        $this->jobSalary = $jobSalary;

        return $this;
    }

    public function getJobPostedDate(): ?\DateTimeInterface
    {
        return $this->jobPostedDate;
    }

    public function setJobPostedDate(\DateTimeInterface $jobPostedDate): self
    {
        $this->jobPostedDate = $jobPostedDate;

        return $this;
    }

    public function getJobIamge(): ?string
    {
        return $this->jobIamge;
    }

    public function setJobIamge(string $jobIamge): self
    {
        $this->jobIamge = $jobIamge;

        return $this;
    }

    public function getJobLocation(): ?string
    {
        return $this->jobLocation;
    }

    public function setJobLocation(string $jobLocation): self
    {
        $this->jobLocation = $jobLocation;

        return $this;
    }
}
