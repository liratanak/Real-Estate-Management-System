<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class UserRoleRepository extends EntityRepository {

	public function getOptionsForSelect() {
		$roles = array();
		foreach ($this->findAll() as $role) {
			$roles[$role->getRoleId()] = $role->getRoleId();
		}
		return $roles;
	}

}