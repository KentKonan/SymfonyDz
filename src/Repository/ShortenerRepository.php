<?php

namespace App\Repository;

use App\Entity\Shortener;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shortener>
 *
 * @method Shortener|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shortener|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shortener[]    findAll()
 * @method Shortener[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShortenerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shortener::class);
    }

    public function save( $entity = null, bool $flush = true): void
    {
        if (!is_null($entity)) {
            $this->getEntityManager()->persist($entity);
        }

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Shortener[] Returns an array of Shortener objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Shortener
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
