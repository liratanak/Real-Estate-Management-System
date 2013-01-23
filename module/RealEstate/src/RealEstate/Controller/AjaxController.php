<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AjaxController extends AbstractActionController {

	public function ajaxAction() {
		$users = $this->getEntityManager()->getRepository('RealEstate\Entity\User')->findAll();
		$json = array();
		foreach ($users as $user) {
			$json[] = $user->getUsername();
		}
		$this->layout('layout/ajax');
		return new ViewModel(array(
					'jsonData' => json_encode($json),
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
