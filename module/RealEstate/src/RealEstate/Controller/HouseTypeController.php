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

class HouseTypeController extends AbstractActionController {

	public function indexAction() {
		$houseTypes = $this->getEntityManager()->getRepository('RealEstate\Entity\HouseType')->findAll();

		return new ViewModel(array(
					'houseTypes' => $houseTypes,
				));
	}

	public function addAction() {
		$form = new \RealEstate\Form\HouseTypeForm();

		$request = $this->getRequest();
		if ($request->isPost()) {

			$houseTypeFilter = new \RealEstate\Form\Filter\HouseTypeFilter($this->getServiceLocator()->get('db'));
			$form->setInputFilter($houseTypeFilter->getInputFilter());

			$postData = $request->getPost();
			$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

			$form->setData($postData);

			if ($form->isValid()) {
				$houseType = new \RealEstate\Entity\HouseType();

				$houseType->setCreatedTime(time());
				$houseType->setLastModifiedTime(time());

				$houseType->setCreatedUser($user);
				$houseType->setLastModifiedUser($user);

				$houseType->setTitle($postData->title);

				$this->getEntityManager()->persist($houseType);
				$this->getEntityManager()->flush();

				$this->redirect()->toRoute('house-type');
			}
		}

		return new ViewModel(array(
					'form' => $form,
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
