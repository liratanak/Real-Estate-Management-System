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

class HouseController extends AbstractActionController {

	protected $houseRepository;

	public function indexAction() {

		if (!$this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}

		$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();
		$houses = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findBy(array('user' => $user));

		$rooms = array();
		if (is_array($houses)) {
			$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($houses));
			foreach ($houses as $house) {
				$rooms[$house->getId()] = $this->getEntityManager()->getRepository('RealEstate\Entity\Room')->findBy(array('house' => $house));
			}
		} else {
			$paginator = $houses;
		}

		$paginator->setItemCountPerPage(10);
		$paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));

		return new ViewModel(array(
					'houses' => $paginator,
					'rooms' => $rooms,
				));
	}

	//manage all class name
	public function getHouseRepository() {
		if (!$this->houseRepository) {
			$sm = $this->getServiceLocator();
			$this->houseRepository = $sm->get('RealEstate\Model\HouseRepository');
		}
		return $this->houseRepository;
	}

	public function viewDetailAction() {
		$houseUid = $this->params('houseUid');
		return new ViewModel(array(
					//ownself tell reporcetory to do this funtion
					'house' => $this->getHouseRepository()->selectHouseById($houseUid)->current(),
//			'address' => $this->getHouseRepository()->selectAddressById($houseUid)->current(),
//			'size' => $this->getHouseRepository()->selectSizeById($houseUid)->current(),
//			'user' => $this->getHouseRepository()->selectUserById($houseUid)->current(),
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
