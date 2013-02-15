<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CreatorController extends AbstractActionController {

	public function houseAction() {

		if (!$this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}


		$form = new \RealEstate\Form\HouseForm();

		$form->get('houseType')->setValueOptions($this->getEntityManager()->getRepository('RealEstate\Entity\HouseType')->getOptions());
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$houseFilter = new \RealEstate\Form\Filter\HouseFilter($this->getServiceLocator()->get('db'));

			$form->setInputFilter($houseFilter->getInputFilter());
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$data = $request->getPost();

				$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

				$house = new \RealEstate\Entity\House();
				$houseType = new \RealEstate\Entity\HouseType();
				$address = new \RealEstate\Entity\Address();
//				$size = new \RealEstate\Entity\Size();

				$house->setCreatedTime(time());
				$house->setLastModifiedTime(time());
				
				$house->setUser($user);
				$house->setCreatedUser($user);
				$house->setLastModifiedUser($user);

				$houseType->setCreatedUser($user);
				$houseType->setLastModifiedUser($user);

				$address->setCreatedUser($user);
				$address->setLastModifiedUser($user);

				$houseType->setTitle($data->houseType);
				$this->save($houseType);


				$address->setHouse($data->houseNumber);
				$address->setStreet($data->street);
				$address->setAddress($data->address);
				$address->setLatitude($data->latitude);
				$address->setLongitude($data->longitude);
				$this->save($address);

				$house->setCost($data->cost);
				$house->setAddress($address);
				$house->setType($houseType);

				$house->setAvailable($data->avaialbe);
				$house->setIsRoomRent($data->haveRoomRent);
				$house->setOtherinfo($data->other);

				$this->save($house);
				
				$this->redirect()->toRoute('home');
			}
		}
		return new ViewModel(array(
					'form' => $form
				));
	}

	public function roomAction() {

		$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

		return new ViewModel(array(
				));
	}

	private function save($entity) {
		$this->getEntityManager()->persist($entity);
		$this->getEntityManager()->flush();
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
