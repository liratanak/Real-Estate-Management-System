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
		
		var_dump($group);	
		
		$this->getEntityManager()->remove($group);
		$this->getEntityManager()->flush();
		return new ViewModel();
	}
	
	public function roleAction(){
		$role = new \RealEstate\Entity\Role();
		
		
		
//		$this->getEntityManager()->persist($role);
//		$this->getEntityManager()->flush();
	}
	
	public function createRoleAction(){
		
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
