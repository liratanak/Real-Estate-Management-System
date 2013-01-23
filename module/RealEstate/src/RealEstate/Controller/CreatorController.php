<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use RealEstate\Entity\Group;

class CreatorController extends AbstractActionController {

	public function houseAction() {
		
		$house = new \RealEstate\Entity\House();
		
		$this->getEntityManager()->persist($house);
		$this->getEntityManager()->flush();
		
		var_dump($house->getId());
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
