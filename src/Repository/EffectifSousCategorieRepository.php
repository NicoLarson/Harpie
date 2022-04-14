<?php

namespace App\Repository;

use App\Entity\EffectifSousCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EffectifSousCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method EffectifSousCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method EffectifSousCategorie[]    findAll()
 * @method EffectifSousCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectifSousCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EffectifSousCategorie::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EffectifSousCategorie $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(EffectifSousCategorie $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EffectifSousCategorie[] Returns an array of EffectifSousCategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EffectifSousCategorie
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
