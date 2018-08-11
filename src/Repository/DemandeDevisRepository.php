<?php

namespace App\Repository;

use App\Entity\DemandeDevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DemandeDevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeDevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeDevis[]    findAll()
 * @method DemandeDevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeDevisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DemandeDevis::class);
    }

//    /**
//     * @return DemandeDevis[] Returns an array of DemandeDevis objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemandeDevis
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
