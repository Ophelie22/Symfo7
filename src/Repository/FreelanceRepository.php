<?php

namespace App\Repository;

use App\Entity\Freelance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use JetBrains\PhpStorm\ArrayShape;

/**use JetBrains\PhpStorm\ArrayShape;

 * @extends ServiceEntityRepository<Freelance>
 */
class FreelanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Freelance::class);
    }


    public function findTheMostUseFirstname(): ?array
    {
        return $this->createQueryBuilder('f')
            ->select('f.firstname, COUNT(f.firstname) as count')
            ->groupBy('f.firstname')
            ->orderBy('count', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
