<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class FreelanceJeanPaulDto
{
    public ?\DateTimeInterface $createdAt = null;
    public ?\DateTimeInterface $updatedAt = null;
    #public ?string $linkedInUrl = null;

    public function __construct(
        #[Assert\NotBlank]
        #[Assert\NotNull]
        public string $firstName,

        #[Assert\NotBlank]
        #[Assert\NotNull]
        public string $lastName,

        #[Assert\NotBlank]
        #[Assert\NotNull]
        public string $jobTitle, // Assurez-vous que jobTitle est initialisé

        #[Assert\Type('integer')]
        public int $jeanPaulId
    ) {}

    public function getNumberOfFreelancesInJeanPaulWebsiteHomePage(): int
    {
        return 0; // À implémenter selon votre logique métier
    }
}
