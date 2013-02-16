<?php

namespace RealEstate\Form;

use Zend\Form\Form;

class HouseForm extends Form {

	public function __construct() {
		parent::__construct();

		$this->setName('house');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'cost',
			'options' => array(
				'label' => 'Cost (៛)',
			),
			'attributes' => array(
				'type' => 'text',
			),
		));

		$this->add(array(
			'name' => 'houseType',
			'type' => '\Zend\Form\Element\Select',
			'options' => array(
				'label' => 'Type',
			),
			'attributes' => array(
				'class' => 'select'
			),
		));

		$this->add(array(
			'name' => 'image',
			'type' => '\Zend\Form\Element\File',
			'options' => array(
				'label' => 'Image',
			),
			'attributes' => array(
			),
		));
		$this->add(array(
			'name' => 'houseNumber',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'No',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'street',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'street',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'address',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Address',
			),
			'attributes' => array(
				'class' => 'address',
				'id' => 'address'
			),
		));

		$this->add(array(
			'name' => 'other',
			'type' => '\Zend\Form\Element\Textarea',
			'options' => array(
				'label' => 'Other Info',
			),
			'attributes' => array(
			),
		));


		$this->add(array(
			'name' => 'longitude',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Longitude',
			),
			'attributes' => array(
				'id' => 'longitude',
				'readonly' => 'readonly',
			),
		));

		$this->add(array(
			'name' => 'latitude',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Latitude',
			),
			'attributes' => array(
				'id' => 'latitude',
				'readonly' => 'readonly',
			),
		));
	}

}