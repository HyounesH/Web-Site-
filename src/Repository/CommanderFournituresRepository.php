<?php

namespace App\Repository;

use App\Entity\CommanderFournitures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommanderFournitures|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommanderFournitures|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommanderFournitures[]    findAll()
 * @method CommanderFournitures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommanderFournituresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommanderFournitures::class);
    }

//    /**
//     * @return CommanderFournitures[] Returns an array of CommanderFournitures objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommanderFournitures
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
