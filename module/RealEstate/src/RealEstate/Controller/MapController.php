<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use GoogleMaps\Request as MapRequest;

class MapController extends AbstractActionController {

	public function indexAction() {
		$this->layout('layout/map');
		return new ViewModel(array(
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
