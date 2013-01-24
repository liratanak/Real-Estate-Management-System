<?php

namespace RealEstate\Form;

use Zend\Form\Form;

class MessageForm extends Form {

	public function __construct() {
		parent::__construct();

		$this->setName('message');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'to',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'To',
			),
			'attributes' => array(
			),
		));


		$this->add(array(
			'name' => 'title',
			'type' => '\Zend\Form\Element\Text',
			'options' => array(
				'label' => 'Title',
			),
			'attributes' => array(
			),
		));

		$this->add(array(
			'name' => 'content',
			'type' => '\Zend\Form\Element\Textarea',
			'options' => array(
				'label' => 'Message',
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