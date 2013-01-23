<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class MessageRepository extends EntityRepository {

	public function findByLastModifiedTime($lastModifiedTime, $userId) {
		$qb = $this->_em->createQueryBuilder();
		$qb->select('m')
				->from('RealEstate\Entity\Message', 'm')
				->where('m.lastModifiedTime > :lastModifiedTime')
				->andWhere('m.toUser = :userId')
				->andWhere('m.unread = 1')
				->setParameter('lastModifiedTime', $lastModifiedTime)
				->setParameter('userId', $userId);

		return $qb->getQuery()->getResult();
	}
	
	

}