<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CommentController extends AbstractActionController {

	public function commentAction() {
		$success = 0;
		if ($this->getRequest()->isXmlHttpRequest()) {
			$data = $this->getRequest()->getPost();
			$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

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
		}
		$this->layout('layout/blank');
		return new ViewModel(array(
					'success' => $success
				));
	}

	public function getAction() {

		$mostRecentCommentTime = 0;
		$comments = array();

		if ($this->getRequest()->isXmlHttpRequest()) {

			$data = $this->getRequest()->getPost();
			$lastShownCommentTime = $data->mostRecentCommentTime;

			$house = $this->getEntityManager()->find('RealEstate\Entity\House', $data->houseId);
			$query = $this->getEntityManager()->createQuery('SELECT MAX(m.lastModifiedTime) FROM RealEstate\Entity\Comment m WHERE m.house = '
					. $house->getId()
					. ' ');

			$mostRecentCommentTimeArray = $query->getResult();

			if (isset($mostRecentCommentTimeArray[0][1])) {
				$mostRecentCommentTime = $mostRecentCommentTimeArray[0][1];
			}

			if ($lastShownCommentTime < $mostRecentCommentTime) {
				$comments = $this->getEntityManager()->getRepository('RealEstate\Entity\Comment')->findByLastModifiedTime($lastShownCommentTime, $house->getId());
			}
		}

		$commentsArray = array();
		foreach ($comments as $key => $comment) {
			$commentsArray[$key] = array(
				'username' => $comment->getUser()->getUsername(),
				'content' => $comment->getContent(),
			);
		}

		$result = array(
			'comments' => $commentsArray,
			'newTime' => $mostRecentCommentTime,
		);


		$this->layout('layout/blank');
		return new ViewModel(array(
					'data' => json_encode($result),
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
