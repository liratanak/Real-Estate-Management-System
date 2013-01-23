<?php

namespace RealEstate\Form\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class HouseFilter implements InputFilterAwareInterface {

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

			$inputFilter->add($factory->createInput(array(
						'name' => 'id',
						'required' => true,
						'filters' => array(
							array('name' => 'Int'),
						),
					)));

			$inputFilter->add($factory->createInput(array(
						'name' => 'cost',
						'required' => true,
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'min' => 1,
									'max' => 10,
								),
							),
							array(
								'name' => 'Db\NoRecordExists',
								'options' => array(
									'table' => 'house',
									'field' => 'cost',
									'adapter' => $this->adapter
								),
							),
						),
					)));

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}

}
