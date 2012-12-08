<?php

namespace RealEstate\Model;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

abstract class DefaultModel implements InputFilterAwareInterface {

	public $uid;
	protected $inputFilter;

	/**
	 * Used by ResultSet to pass each database row to the entity
	 */
	public function exchangeArray($data) {
		$this->uid = (isset($data['uid'])) ? $data['uid'] : null;
	}

	public function getArrayCopy() {
		return get_object_vars($this);
	}

	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception("Not used");
	}

	public function getInputFilter() {
		
	}

}
