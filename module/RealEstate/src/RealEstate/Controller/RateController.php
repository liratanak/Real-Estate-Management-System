<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RateController extends AbstractActionController {

	public function rateAction() {
		$data = array('already' => FALSE, 'loggedin' => FALSE);
		if ($this->getRequest()->isXmlHttpRequest()) {
			$postData = $this->getRequest()->getPost();
			$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

			$house = $this->getEntityManager()->find('RealEstate\Entity\House', $postData->houseId);
			if (NULL !== $house && NULL !== $user) {
				$data['loggedin'] = TRUE;
				$rate = $this->getEntityManager()->getRepository('RealEstate\Entity\Rate')->findOneBy(
						array(
							'user' => $user,
							'house' => $house,
						)
				);
				if (NULL === $rate) {
					if (1 == $postData->rateValue) {
						$house->setPositiveRateNumber($house->getPositiveRateNumber() + 1);
					} else if (0 == $postData->rateValue) {
						$house->setNegativeRateNumber($house->getNegativeRateNumber() + 1);
					}
					$rate = new \RealEstate\Entity\Rate();
					$rate->setCreatedUser($user);
					$rate->setCreatedTime(time());
					$rate->setLastModifiedUser($user);
					$rate->setLastModifiedTime(time());

					$rate->setUser($user);
					$rate->setHouse($house);

					$this->getEntityManager()->persist($rate);
				} else {
					$data['already'] = TRUE;
				}
				$data['positive'] = $house->getPositiveRateNumber();
				$data['negative'] = $house->getNegativeRateNumber();
			}

			$this->getEntityManager()->persist($house);
			$this->getEntityManager()->flush();

			$this->layout('layout/ajax');
		}
		return new ViewModel(array(
					'data' => json_encode($data),
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
