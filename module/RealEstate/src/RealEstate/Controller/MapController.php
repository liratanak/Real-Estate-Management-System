<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use GoogleMaps\Request as MapRequest;

class MapController extends AbstractActionController {

	public function indexAction() {
		return new ViewModel(array(
				));
	}

	public function showAction() {
		$this->layout('layout/blank');

		$houses = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findAll();

		$xmlString = '<markers>';
		foreach ($houses as $house) {
			$xmlString .= '<marker name="' . $house->getCost() . ' ៛/month'
					. '" address="' . $house->getAddress()->getHouse() . ', ' . $house->getAddress()->getStreet() . ', '
					. $house->getAddress()->getAddress() . '" '
					. 'lat="' . $house->getAddress()->getLatitude() . '" '
					. 'lng="' . $house->getAddress()->getLongitude() . '" '
					. 'type="' . $house->getType()->getTitle() . '" />';
		}
		$xmlString .= '</markers>';

		$this->getResponse()->getHeaders()->addHeaders(array('Content-type' => 'text/xml'));
		return new ViewModel(array(
					'xml' => $xmlString,
				));
	}

	/**
	 * Entity manager instance
	 *           
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;

	/**
	 * Returns an instance of the Doctrine entity manager loaded from the service 
	 * locator
	 * 
	 * @return Doctrine\ORM\EntityManager
	 */
	public function getEntityManager() {
		if (null === $this->em) {
			$this->em = $this->getServiceLocator()
					->get('doctrine.entitymanager.orm_default');
		}
		return $this->em;
	}

}
