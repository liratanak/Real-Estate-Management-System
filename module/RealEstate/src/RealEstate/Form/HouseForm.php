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
				'label' => 'Cost',
			),
			'attributes' => array(
				'type' => 'text',
			),
		));

		$this->add(array(
			'name' => 'houseType',
			'options' => array(
				'type' => 'text',
				'label' => 'House type',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'width',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Width',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'height',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Height',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'lenght',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Lenght',
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
			'name' => 'village',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Village',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'district',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'District',
			),
			'attributes' => array(
			),
		));


		$this->add(array(
			'name' => 'quarter',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Quarter',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'city',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'City',
			),
			'attributes' => array(
			),
		));


		$this->add(array(
			'name' => 'avaialbe',
			'type' => '\Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Available',
			),
			'attributes' => array(
			),
		));


		$this->add(array(
			'name' => 'haveRoomRent',
			'type' => '\Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Rooms',
			),
			'attributes' => array(
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
			),
		));

		$this->add(array(
			'name' => 'latitude',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Latitude',
			),
			'attributes' => array(
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
			'name' => 'submit',
			'options' => array(
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