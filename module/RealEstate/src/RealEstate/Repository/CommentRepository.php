<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository {

	public function findByLastModifiedTime($lastModifiedTime, $houseId) {
		$qb = $this->_em->createQueryBuilder();
		$qb->select('c')
				->from('RealEstate\Entity\Comment', 'c')
				->where('c.lastModifiedTime > :lastModifiedTime')
				->andWhere('c.house = :house')
				->setParameter('lastModifiedTime', $lastModifiedTime)
				->setParameter('house', $houseId);

		return $qb->getQuery()->getResult();
	}
	
	

}