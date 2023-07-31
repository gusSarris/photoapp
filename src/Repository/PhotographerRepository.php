<?php

namespace App\Repository;

use App\Entity\Photographer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Photographer>
 *
 * @method Photographer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Photographer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Photographer[]    findAll()
 * @method Photographer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotographerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photographer::class);
    }

//    /**
//     * @return Photographer[] Returns an array of Photographer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Photographer
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
