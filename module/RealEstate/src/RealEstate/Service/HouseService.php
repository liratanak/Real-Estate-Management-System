<?php

namespace RealEstate\Service;

use RealEstate\Entity\House;

class HouseService {

	public function getHouseEntity($data = NULL) {
		if(NULL === $data) return NULL;
		$houseEntity = new House();
		
	}

}

?>
