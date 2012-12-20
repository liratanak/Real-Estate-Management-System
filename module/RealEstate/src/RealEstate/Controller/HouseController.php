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
		return new ViewModel(array(

						//ownself tell reporcetory to do this funtion
			'houses' => $this->getHouseRepository()->findAll(),
//			'action' => 'aaa'
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

	public function viewAction() {
		$houseUid = $this->params('houseUid');



//		$house = $houseUid;

		return new ViewModel(array(
					'houseUid' => $houseUid,
				));
	}

	public function rssAction() {

	}

		public function viewDetailAction(){
			$houseUid = $this->params('houseUid');
		return new ViewModel(array(
						//ownself tell reporcetory to do this funtion
			'detail' => $this->getHouseRepository()->selectHouseById($houseUid)->current(),
		));
	}
}
