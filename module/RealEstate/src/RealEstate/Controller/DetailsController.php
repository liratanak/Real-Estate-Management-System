<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DetailsController extends AbstractActionController {

	public function indexAction() {
		return new ViewModel(array(
				));
	}

	public function detailsAction() {
		$propertyType = $this->params('propertyType');
		$propertyId = $this->params('propertyId');
		$username = $this->params('username');

		$user = NULL;
		if (NULL !== $username) {
			$user = $this->getEntityManager()->getRepository('RealEstate\Entity\User')->findOneBy(array('username' => $username));
		}

		$houses = NULL;
		$oneHouse = NULL;
		$form = NULL;
		$comments = NULL;
		if (NULL !== $propertyType) {
			if ('houses' === $propertyType || 'house' === $propertyType) {
				$houses = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findBy(array('user' => $user));

				if (NULL !== $propertyId) {
					$oneHouse = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findOneBy(array('id' => $propertyId));
					$form = new \RealEstate\Form\CommentForm();
					$comments = $this->getEntityManager()->getRepository('RealEstate\Entity\Comment')->findBy(array('house' => $oneHouse));
				}
			}
		}

		return new ViewModel(array(
					'user' => $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity(),
					'houses' => $houses,
					'oneHouse' => $oneHouse,
					'form' => $form,
					'comments' => $comments
				));
	}

	public function getHouseById($propertyId) {
		if (NULL !== $propertyId) {
			
		}
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
