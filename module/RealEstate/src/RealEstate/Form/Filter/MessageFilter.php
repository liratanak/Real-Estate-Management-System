<?php

namespace RealEstate\Form\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class MessageFilter implements InputFilterAwareInterface {

	protected $inputFilter;
	protected $adapter;

	public function __construct($adapter = NULL) {
		$this->adapter = $adapter;
	}

	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception("Not used");
	}

	public function getInputFilter() {
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$factory = new InputFactory();

			$inputFilter->add($factory->createInput(
							array(
								'name' => 'to',
								'required' => true,
								'filters' => array(
									array('name' => 'StripTags'),
									array('name' => 'StringTrim'),
								),
								'validators' => array(
									array(
										'name' => 'Db\RecordExists',
										'options' => array(
											'table' => 'user',
											'field' => 'username',
											'adapter' => $this->adapter,
										)
									)
								),
							)
					)
			);

			$inputFilter->add($factory->createInput(
							array(
								'name' => 'title',
								'required' => true,
								'filters' => array(
									array('name' => 'StripTags'),
									array('name' => 'StringTrim'),
								),
							)
					)
			);

			$inputFilter->add($factory->createInput(
							array(
								'name' => 'content',
								'required' => true,
								'filters' => array(
									array('name' => 'StripTags'),
									array('name' => 'StringTrim'),
								),
							)
					)
			);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
