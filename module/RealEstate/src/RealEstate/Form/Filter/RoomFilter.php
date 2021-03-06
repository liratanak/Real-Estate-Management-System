<?php

namespace RealEstate\Form\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class RoomFilter implements InputFilterAwareInterface {

	protected $inputFilter;

	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception("Not used");
	}

	public function getInputFilter() {
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$factory = new InputFactory();

			$inputFilter->add($factory->createInput(
							array(
								'name' => 'roomNumber',
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
								'name' => 'cost',
								'required' => true,
								'filters' => array(
									array('name' => 'StripTags'),
									array('name' => 'StringTrim'),
								),
								'validators' => array(
									array('name' => 'Digits')
								),
							)
					)
			);

			$inputFilter->add($factory->createInput(array(
						'name' => 'width',
						'required' => true,
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'GreaterThan',
								'options' => array(
									'min' => 0
								)
							),
						),
							)
					)
			);

			$inputFilter->add($factory->createInput(array(
						'name' => 'height',
						'required' => true,
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'GreaterThan',
								'options' => array(
									'min' => 0
								)
							),
						),
							)
					)
			);

			$inputFilter->add($factory->createInput(array(
						'name' => 'lenght',
						'required' => true,
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'GreaterThan',
								'options' => array(
									'min' => 0
								)
							),
						),
							)
					)
			);

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
