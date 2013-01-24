<?php

namespace RealEstate\Form;

use Zend\Form\Form;

class RoomForm extends Form {

	public function __construct() {
		parent::__construct();

		$this->setName('message');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'roomNumber',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Room number',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'cost',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Title',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'toilet',
			'type' => '\Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Toilet',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'kitchen',
			'type' => '\Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Kitchen',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'available',
			'type' => '\Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Available',
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
			'name' => 'submit',
			'options' => array(
			),
			'attributes' => array(
				'type' => 'submit',
				'class' => 'btn',
				'value' => 'Send',
			),
		));
	}

}