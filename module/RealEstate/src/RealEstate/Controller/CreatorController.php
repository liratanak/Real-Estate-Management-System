<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use RealEstate\Entity\Group;

class CreatorController extends AbstractActionController {

	public function newAction() {
		$entity = $this->params('entity');

		return new ViewModel();
	}

	public function groupAction() {
		$group = new Group();
		
		$group->setTitle('Owner');
		$group->setCreatedUser($this->getEntityManager()->find('RealEstate\Entity\User',2));
		$group->setLastModifiedUser($this->getEntityManager()->find('RealEstate\Entity\User',2));
		
		var_dump($group);			
		
		$this->getEntityManager()->persist($group);
//		$this->getEntityManager()->flush();
		return new ViewModel();
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
