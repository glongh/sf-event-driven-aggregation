<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11/9/14
 * Time: 1:51 PM
 */

namespace App\G1Bundle\Entity;


use Doctrine\ORM\EntityRepository;

class ArtWorkRepository extends EntityRepository
{
    public function getLatest10(){
        return $this->createQueryBuilder('art')
            ->orderBy('art.id', 'desc')
            ->setMaxResults(10)
            ->getQuery()
            ->execute();
    }

    public function getFeatured() {
        return $this->createQueryBuilder('art')
            ->where('art.featured = 1')
            ->getQuery()
            ->execute();
    }
} 