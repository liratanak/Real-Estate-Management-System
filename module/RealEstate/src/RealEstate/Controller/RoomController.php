<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RoomController extends AbstractActionController {

	public function newAction() {
		$form = new \RealEstate\Form\RoomForm();
		$roomFilter = new \RealEstate\Form\Filter\RoomFilter();
		$form->setInputFilter($roomFilter->getInputFilter());

		$houseId = $this->params('houseId');
		$form->get('houseId')->setValue($houseId);

		$request = $this->getRequest();
		if ($request->isPost()) {
			$data = $request->getPost();
			$form->setData($data);
			if ($form->isValid()) {
				$room = new \RealEstate\Entity\Room();
				$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();
				$house = $this->getEntityManager()->find('RealEstate\Entity\House', $data->houseId);

				if (NULL !== $user && NULL !== $house) {
					$room->setLastModifiedUser($user);
					$room->setLastModifiedTime(time());
					$room->setCreatedUser($user);
					$room->setCreatedTime(time());
					$room->setHouse($house);
					$room->setKitchen($data->kitchen);
					$room->setToilet($data->toilet);
					$room->setAvailable($data->available);
					$room->setCost($data->cost);

					$size = new \RealEstate\Entity\Size();
					$size->setLastModifiedUser($user);
					$size->setLastModifiedTime(time());
					$size->setCreatedUser($user);
					$size->setCreatedTime(time());
					$size->setLength($data->lenght);
					$size->setWidth($data->width);
					$size->setHeight($data->height);


					$this->getEntityManager()->persist($size);
					$this->getEntityManager()->flush();
					
					$room->setSize($size);
					$this->getEntityManager()->persist($room);
					$this->getEntityManager()->flush();
				}
			}
		}

		if ($this->getRequest()->isXmlHttpRequest()) {
			$this->layout('layout/blank');
		}
		return new ViewModel(array(
					'form' => $form,
					'houseId' => $houseId,
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
