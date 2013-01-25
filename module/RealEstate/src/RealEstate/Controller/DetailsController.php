<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DetailsController extends AbstractActionController {

	public function __construct() {
		
	}

	public function init() {
		if (!$this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}
	}

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
		$mostRecentCommentTime = 0;
		if (NULL !== $propertyType) {
			if ('houses' === $propertyType || 'house' === $propertyType) {
				$houses = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findBy(array('user' => $user));

				if (NULL !== $propertyId) {
					if ($this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->hasIdentity()) {
						$form = new \RealEstate\Form\CommentForm();
					}
					$oneHouse = $this->getEntityManager()->getRepository('RealEstate\Entity\House')->findOneBy(array('id' => $propertyId, 'user' => $user));
					$comments = $this->getEntityManager()->getRepository('RealEstate\Entity\Comment')->findBy(array('house' => $oneHouse));

					if (NULL !== $oneHouse) {
						$query = $this->getEntityManager()->createQuery('SELECT MAX(c.lastModifiedTime) FROM RealEstate\Entity\Comment c WHERE c.house = ' . $oneHouse->getId() . ' ');
						$mostRecentCommentTimeArray = $query->getResult();

						if (isset($mostRecentCommentTimeArray[0][1])) {
							$mostRecentCommentTime = $mostRecentCommentTimeArray[0][1];
						}
					}
				}
			}
		}

		return new ViewModel(array(
					'user' => $user,
					'houses' => $houses,
					'oneHouse' => $oneHouse,
					'form' => $form,
					'comments' => $comments,
					'mostRecentCommentTime' => $mostRecentCommentTime,
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
