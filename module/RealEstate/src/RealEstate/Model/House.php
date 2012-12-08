<?php

namespace RealEstate\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class House extends \RealEstate\Model\DefaultModel {

	public $cost;

	/**
	 * Used by ResultSet to pass each database row to the entity
	 */
	public function exchangeArray($data) {
		parent::exchangeArray($data);
		$this->cost = (isset($data['cost'])) ? $data['cost'] : null;
	}

}
