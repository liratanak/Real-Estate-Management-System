<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class HouseTypeRepository extends EntityRepository {

	public function getOptions() {
		$hosueTypes = array();
		foreach ($this->findAll() as $t) {
			$hosueTypes[$t->getId()] = $t->getTitle();
		}
		return $hosueTypes;
	}

}