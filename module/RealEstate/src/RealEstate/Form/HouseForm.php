<?php

namespace RealEstate\Form;

use Zend\Form\Form;

class HouseForm extends Form {

	public function __construct() {
		parent::__construct();

		$this->setName('album');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'cost',
			'options' => array(
				'label' => 'Cost',
			),
			'attributes' => array(
				'type' => 'text',
				'label' => 'Artist',
			),
		));

		$this->add(array(
			'name' => 'submit',
			'options' => array(
				'label' => 'Go',
			),
			'attributes' => array(
				'type' => 'submit',
				'class' => 'btn',
				'value' => 'Add',
				'id' => 'submitbutton',
			),
		));
	}

}