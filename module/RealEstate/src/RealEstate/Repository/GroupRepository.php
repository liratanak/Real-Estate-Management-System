<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class GroupRepository extends EntityRepository {

	public function findAllUsers($groupId = 0) {

		$qb = $this->_em->createQueryBuilder();
		$qb->select('u')
				->from('RealEstate\Entity\User', 'u')
				->where('u.group = :groupId')
				->setParameter('groupId', $groupId);

		return $qb->getQuery()->getResult();
	}

}