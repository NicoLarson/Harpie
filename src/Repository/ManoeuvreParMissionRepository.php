<?php

namespace App\Repository;

use App\Entity\ManoeuvreParMission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ManoeuvreParMission|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManoeuvreParMission|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManoeuvreParMission[]    findAll()
 * @method ManoeuvreParMission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManoeuvreParMissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManoeuvreParMission::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ManoeuvreParMission $entity, bool $flush = true): void
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
    public function remove(ManoeuvreParMission $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ManoeuvreParMission[] Returns an array of ManoeuvreParMission objects
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
    public function findOneBySomeField($value): ?ManoeuvreParMission
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
