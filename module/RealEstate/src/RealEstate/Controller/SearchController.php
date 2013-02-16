<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SearchController extends AbstractActionController {

	public function indexAction() {
		$searchTerm = $this->params('term');

		$houses = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->Search($searchTerm);

		$this->layout('layout/blank');
		return new ViewModel(array(
					'houses' => $houses,
					'term' => $searchTerm,
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
