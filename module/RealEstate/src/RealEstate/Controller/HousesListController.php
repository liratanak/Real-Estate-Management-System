<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use RealEstate\Model\HouseRepository;
use RealEstate\Entity\House;

class HousesListController extends AbstractActionController {

	protected $houseRepository;

	public function listAction() {
		$house = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findAll();
//		var_dump($house);
		if (is_array($house)) {
			$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($house));
		} else {
			$paginator = $house;
		}


		$paginator->setItemCountPerPage(10);
		$paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
		return new ViewModel(array(
					'houses' => $paginator,
				));
	}

	public function indexAction() {
		return new ViewModel(array(
					'houses' => $this->getHouseRepository()->listAll()
				));
	}

	public function onehouseAction() {
		return array('one' => $housesDoctrine = $this->getEntityManager()->find('RealEstate\Entity\House', 1));
	}

	public function viewAction() {
		$pnb = $this->params('pageNumber');
		$tRes = $this->getHouseRepository()->countAll();
		return new ViewModel(array(
					'pageNumber' => $pnb, 'totalResult' => $tRes->current(),
					'houses' => $this->getHouseRepository()->listAll(),
						)
		);
	}

	public function getHouseRepository() {
		if (!$this->houseRepository) {
			$sm = $this->getServiceLocator();
			$this->houseRepository = $sm->get('RealEstate\Model\HouseRepository');
		}
		return $this->houseRepository;
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
