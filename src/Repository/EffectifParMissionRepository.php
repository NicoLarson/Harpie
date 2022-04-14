<?php

namespace App\Repository;

use App\Entity\EffectifParMission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EffectifParMission|null find($id, $lockMode = null, $lockVersion = null)
 * @method EffectifParMission|null findOneBy(array $criteria, array $orderBy = null)
 * @method EffectifParMission[]    findAll()
 * @method EffectifParMission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectifParMissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EffectifParMission::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EffectifParMission $entity, bool $flush = true): void
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
    public function remove(EffectifParMission $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EffectifParMission[] Returns an array of EffectifParMission objects
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
    public function findOneBySomeField($value): ?EffectifParMission
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
