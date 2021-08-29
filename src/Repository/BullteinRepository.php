<?php

namespace App\Repository;

use App\Entity\Matiere;
use App\Entity\Bulltein;
use App\Entity\MatiereClasse;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\DependencyInjection\Loader\Configurator\console;

/**
 * @method Bulltein|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bulltein|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bulltein[]    findAll()
 * @method Bulltein[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BullteinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bulltein::class);
    }

    // /**
    //  * @return Bulltein[] Returns an array of Bulltein objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bulltein
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findWithFortunesJoin()
    {

        $dql = 'SELECT m FROM App\Entity\Matiere m 
         JOIN App\Entity\MatiereClasse mc WITH m.id = mc.matiere_id
         WHERE mc.classe_id = 1';

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->execute();
    }
    public function findetudiantid(int $id)
    {
        $dql1 = "SELECT IDENTITY  (b.eleve_id) as eleve_id  From App\Entity\Bulltein b WHERE b.id=:id";
        $query = $this->getEntityManager()->createQuery($dql1)->setParameter('id', $id,);


        var_dump($query);




        return $query->execute();
    }




    public function findnotesBulltein(int $id)
    {

        $dql = 'SELECT n FROM App\Entity\Note n 
        WHERE n.eleve_id =(SELECT   (b.eleve_id)   From App\Entity\Bulltein b
    WHERE b.id=:id)';;
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('id', $id,);

        //var_dump($query->execute());
        return $query->execute();
    }
}
