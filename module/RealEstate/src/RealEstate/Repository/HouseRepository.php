<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class HouseRepository extends EntityRepository {

	public function search($seachTerm) {
		return 'FanBoya';
	}

}