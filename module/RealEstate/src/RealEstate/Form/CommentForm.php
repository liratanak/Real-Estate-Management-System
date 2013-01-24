<?php

namespace RealEstate\Form;

use Zend\Form\Form;

class CommentForm extends Form {

	public function __construct() {
		parent::__construct();

		$this->setName('comment');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'content',
			'type' => '\Zend\Form\Element\Textarea',
			'attributes' => array(
				'placeholder' => 'Comment ... ',
				'id'=>'commentTextarea',
			),
		));
		$this->add(array(
			'name' => 'submit',
			'options' => array(
			),
			'attributes' => array(
				'type' => 'submit',
				'id' => 'commentButton',
				'class' => 'btn',
				'value' => 'Comment',
			),
		));
	}

}