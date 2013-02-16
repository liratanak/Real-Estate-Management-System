<?php

namespace RealEstate\Form;

use Zend\Form\Form;

class HouseTypeForm extends Form {

	public function __construct() {
		parent::__construct();

		$this->setName('houseType');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'title',
			'type' => '\Zend\Form\Element\Text',
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'submit',
			'options' => array(
			),
			'attributes' => array(
				'type' => 'submit',
				'class' => 'btn',
				'value' => 'Add',
			),
		));
	}

}