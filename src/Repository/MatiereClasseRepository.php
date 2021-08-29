<?php

namespace App\Repository;

use App\Entity\MatiereClasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MatiereClasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatiereClasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatiereClasse[]    findAll()
 * @method MatiereClasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatiereClasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatiereClasse::class);
    }

    // /**
    //  * @return MatiereClasse[] Returns an array of MatiereClasse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MatiereClasse
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
