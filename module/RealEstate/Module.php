<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace RealEstate;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use RealEstate\Model\House;
use RealEstate\Model\HouseRepository;
use RealEstate\View\Helper\AbsoluteUrl;

class Module {

	public function onBootstrap(MvcEvent $e) {
		$e->getApplication()->getServiceManager()->get('translator');
		$eventManager = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);


		$e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
					$controller = $e->getTarget();
					$controllerClass = get_class($controller);
					$moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
					$config = $e->getApplication()->getServiceManager()->get('config');
					if (isset($config['module_layouts'][$moduleNamespace])) {
						$controller->layout($config['module_layouts'][$moduleNamespace]);
					}
				}, 100);

		$events = $e->getApplication()->getEventManager()->getSharedManager();
		$events->attach('ZfcUser\Service\User', 'register.post', function($e) {
					$user = $e->getParam('user');  // User account object
					//$form = $e->getParam('form');  // Form object
					// Perform your custom action here

					/* @var $sm ServiceLocatorInterface */
					$sm = $e->getTarget()->getServiceManager();

					/* @var $em \Doctrine\ORM\EntityManager */
					$em = $sm->get('doctrine.entitymanager.orm_default');

					$userRole = $em->find(__NAMESPACE__ . '\Entity\UserRole', DEFAULT_ROLE);
					if (NULL !== $userRole) {
						$user->addRole($userRole);
						$em->persist($user);
						$em->flush();
					}
				}
		);
	}

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getServiceConfig() {
		return array(
			'factories' => array(
				'RealEstate\Model\HouseRepository' => function($sm) {
					$tableGateway = $sm->get('HouseGateway');
					$table = new HouseRepository($tableGateway);
					return $table;
				},
				'HouseGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new House());
					return new TableGateway('house', $dbAdapter, null, $resultSetPrototype);
				},
			),
		);
	}

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getViewHelperConfig() {
		return array(
			'factories' => array(
				// the array key here is the name you will call the view helper by in your view scripts
				'absoluteUrl' => function($sm) {
					$locator = $sm->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
					return new AbsoluteUrl($locator->get('Request'));
				},
			),
		);
	}

}
