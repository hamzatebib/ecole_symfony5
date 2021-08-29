<?php

namespace App\Repository;

use App\Entity\Fichenote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichenote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichenote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichenote[]    findAll()
 * @method Fichenote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichenoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichenote::class);
    }
    public function findnotesFicheNote(int $id)
    {

        $dql = 'SELECT n FROM App\Entity\Note n 
        WHERE n.classe_id =(SELECT   (f.classe_id)   From App\Entity\Fichenote f
    WHERE f.id=:id)';;
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('id', $id,);

        //var_dump($query->execute());
        return $query->execute();
    }

    // /**
    //  * @return Fichenote[] Returns an array of Fichenote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fichenote
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
