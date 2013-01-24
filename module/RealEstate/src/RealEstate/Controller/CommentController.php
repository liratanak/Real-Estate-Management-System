<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CommentController extends AbstractActionController {

	public function commentAction() {
		$success = 0;
		if ($this->getRequest()->isXmlHttpRequest()) {
			$data = $this->getRequest()->getPost();
			$user = $user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

			$comment = new \RealEstate\Entity\Comment();
			$comment->setCreatedUser($user);
			$comment->setLastModifiedUser($user);
			$comment->setUser($user);
			
			$comment->setCreatedTime(time());
			$comment->setLastModifiedTime(time());
			
			$comment->setContent($data->comment);
			$comment->setHouse($this->getEntityManager()->find('RealEstate\Entity\House', $data->houseId));
			
			$this->getEntityManager()->persist($comment);
			$this->getEntityManager()->flush();
			
			var_dump($comment);
		}
		$this->layout('layout/blank');
		return new ViewModel(array(
					'success' => $success
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
