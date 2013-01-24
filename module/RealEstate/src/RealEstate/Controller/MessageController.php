<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MessageController extends AbstractActionController {

	public function indexAction() {
		if (!$this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->hasIdentity()) {
			$this->redirect()->toRoute('zfcuser/login');
			return;
		}

		$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

		$messages = $this->getEntityManager()->getRepository('RealEstate\Entity\Message')->findBy(
				array(
			'toUser' => $user)
				, array('lastModifiedTime' => 'DESC')
		);



		$query = $this->getEntityManager()->createQuery('SELECT MAX(m.lastModifiedTime) FROM RealEstate\Entity\Message m WHERE m.toUser = ' . $user->getUserId() . ' ');
		$mostRecentMessageTimeArray = $query->getResult();

		if (isset($mostRecentMessageTimeArray[0][1])) {
			$mostRecentMessageTime = $mostRecentMessageTimeArray[0][1];
		}

		return new ViewModel(array(
					'messages' => $messages,
					'mostRecentMessageTime' => $mostRecentMessageTime
				));
	}

	public function newMessageByAjaxAction() {

		$mostRecentMessageTime = 0;
		$messages = array();

		if ($this->getRequest()->isXmlHttpRequest()) {

			$data = $this->getRequest()->getPost();

			$lastShownMessageTime = $data->mostRecentMessageTime;

			$user = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

			$query = $this->getEntityManager()->createQuery('SELECT MAX(m.lastModifiedTime) FROM RealEstate\Entity\Message m WHERE m.toUser = ' . $user->getUserId() . ' ');
			$mostRecentMessageTimeArray = $query->getResult();

			if (isset($mostRecentMessageTimeArray[0][1])) {
				$mostRecentMessageTime = $mostRecentMessageTimeArray[0][1];
			}

			if ($lastShownMessageTime < $mostRecentMessageTime) {
				$messages = $this->getEntityManager()->getRepository('RealEstate\Entity\Message')->findByLastModifiedTime($lastShownMessageTime, $user->getUserId());
			}
		}
		
		$messagesArray = array();
		foreach ($messages as $key => $message) {
			$messagesArray[$key] = array(
				'from'  => $message->getFromUser()->getUsername(),
				'title' => $message->getTitle(),
				'content' => $message->getContent(),
			);
		}

		$reslut = array(
			'messages' => $messagesArray,
			'newTime' => $mostRecentMessageTime,
		);


		$this->layout('layout/blank');
		return new ViewModel(array(
					'data' => json_encode($reslut),
				));
	}

	public function newAction() {
		$form = new \RealEstate\Form\MessageForm();

		$request = $this->getRequest();
		if ($request->isPost()) {
			$messageFilter = new \RealEstate\Form\Filter\MessageFilter($this->getServiceLocator()->get('db'));

			$form->setInputFilter($messageFilter->getInputFilter());
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$data = $request->getPost();
				$currentUser = $this->getServiceLocator()->get('zfcuser_user_service')->getAuthService()->getIdentity();

				$message = new \RealEstate\Entity\Message();
				$message->setUnread(1);
				$message->setCreatedTime(time());
				$message->setLastModifiedTime(time());

				$message->setTitle($data->title);
				$message->setContent($data->content);
				$message->setCreatedUser($currentUser);
				$message->setLastModifiedUser($currentUser);
				$message->setFromUser($currentUser);

				$toUser = $this->getEntityManager()->getRepository('RealEstate\Entity\User')->findOneBy(array('username' => $data->to));

				$message->setToUser($toUser);

				$this->getEntityManager()->persist($message);
				$this->getEntityManager()->flush();
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
