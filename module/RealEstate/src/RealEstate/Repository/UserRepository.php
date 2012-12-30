<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

	public function findByUsername($username = '') {

		$qb = $this->_em->createQueryBuilder();
		$qb->select('u')
				->from('RealEstate\Entity\User', 'u')
				->where('u.username = :name')
				->setParameter('name', $username);

		return $qb->getQuery()->getResult();
	}

}