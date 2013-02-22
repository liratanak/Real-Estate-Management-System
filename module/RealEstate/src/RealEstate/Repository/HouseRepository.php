<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class HouseRepository extends EntityRepository {

	public function search($searchTerm) {
		$n = 0;
		$terms = explode(' ', $searchTerm);
		for ($i = 0; $i < count($terms); $i++) {
			if ($terms[$i] == '/') {
				$n++;
				unset($terms[$i]);
			}
		}
		if(count($terms)>0){
		$termLike = 'h.searchTerm like \'%' . $terms[$n] . '%\' 
			         or h.otherInfo like \'%' . $terms[$n] . '%\'
					 or h.cost like \'%' . $terms[$n] . '%\'';	
		}
		
		for ($i = 1; $i < count($terms); $i++) {
			if (!preg_match('/\//', $terms[$i])) {
				$termLike = $termLike . ' or h.searchTerm like \'%' . $terms[$i] . '%\' 
			             or h.otherInfo like \'%' . $terms[$i] . '%\'
					     or h.cost like \'%' . $terms[$i] . '%\'';
			}
		}


		$query = $this->_em->createQuery('SELECT h FROM RealEstate\Entity\House h where ' . $termLike);
		$house = $query->getResult();
		return $house;
	}

}