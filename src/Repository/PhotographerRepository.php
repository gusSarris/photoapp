<?php

namespace App\Repository;

use App\Entity\Photographer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;

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
    /**
     * @return Photographer[] Returns an array of Photographer objects
     */
    public function getRandomPhotographers(int $limit=6): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'select username,photographer.location,photographer.bio,photographer.favorite_photo,photographer.favorite_title,photographer.favorite_desc from user inner join photographer on photographer.user_id_id =user.id;';
        $resultSet = $conn->executeQuery($sql);
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
}
