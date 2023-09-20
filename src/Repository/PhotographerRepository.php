<?php

namespace App\Repository;

use App\Entity\Photographer;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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
    const VIEW_RANDOM_PHOTOGRAPHERS="select * from get_photographers";
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photographer::class);
    }
   // not proper way when photographers are big,just for demonstration
    public function getRandomPhotographers($index=3){
        $em= $this->getEntityManager()->getConnection();
        $query = $em->executeQuery(self::VIEW_RANDOM_PHOTOGRAPHERS.' ORDER BY RAND() limit '.$index.';');
        return $query->fetchAllAssociative();
    }

}
