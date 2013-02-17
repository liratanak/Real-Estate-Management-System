<?php

namespace RealEstate\Repository;

use Doctrine\ORM\EntityRepository;

class HouseRepository extends EntityRepository {

	public function search($searchTerm) {
		
		$terms = explode(' ', $searchTerm);
		$termLike = 'h.searchTerm like \'%'.$terms[0].'%\' 
			         or h.otherInfo like \'%'.$terms[0].'%\'
					 or h.cost like \'%'.$terms[0].'%\'';
		for ($i = 1 ; $i < count($terms) ; $i++) {
			$termLike = $termLike.' or h.searchTerm like \'%'.$terms[$i].'%\' 
			             or h.otherInfo like \'%'.$terms[$i].'%\'
					     or h.cost like \'%'.$terms[$i].'%\'';
		}
		$query = $this->_em->createQuery('SELECT h FROM RealEstate\Entity\House h where '.$termLike);
		$house = $query->getResult();
		return $house;
	}

}