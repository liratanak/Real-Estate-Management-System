<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonGuestHouse for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
	'router' => array(
		'routes' => array(
			'home' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/',
					'defaults' => array(
						'controller' => 'RealEstate\Controller\House',
						'action' => 'index',
					),
				),
			),
			'houses' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/houses',
					'defaults' => array(
						'controller' => 'RealEstate\Controller\House',
						'action' => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					// Segment route for viewing one blog post
					'post' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/[:houseUid]',
							'constraints' => array(
								'slug' => '[a-zA-Z0-9_-]+'
							),
							'defaults' => array(
								'action' => 'view'
							)
						)
					),
					// Literal route for viewing blog RSS feed
					'rss' => array(
						'type' => 'Zend\Mvc\Router\Http\Literal',
						'options' => array(
							'route' => '/rss',
							'defaults' => array(
								'action' => 'rss'
							)
						)
					)
				)
			),
			'hello' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/hello',
					'defaults' => array(
						'controller' => 'RealEstate\Controller\Hello',
						'action' => 'index',
					),
				),
				'options' => array(
					'route' => '/view',
					'defaults' => array(
						'controller' => 'RealEstate\Controller\Hello',
						'action' => 'view',
					),
				),
			),
		// The following is a route to simplify getting started creating
		// new controllers and actions without needing to create a new
		// module. Simply drop new controllers in, and you can access them
		// using the path /application/:controller/:action
//			'application' => array(
//				'type' => 'Literal',
//				'options' => array(
//					'route' => '/application',
//					'defaults' => array(
//						'__NAMESPACE__' => 'GuestHouse\Controller',
//						'controller' => 'Index',
//						'action' => 'index',
//					),
//				),
//				'may_terminate' => true,
//				'child_routes' => array(
//					'default' => array(
//						'type' => 'Segment',
//						'options' => array(
//							'route' => '/[:controller[/:action]]',
//							'constraints' => array(
//								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//							),
//							'defaults' => array(
//							),
//						),
//					),
//				),
//			),
		),
	),
	'service_manager' => array(
		'factories' => array(
			'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
		),
	),
	'translator' => array(
		'locale' => 'en_US',
		'translation_file_patterns' => array(
			array(
				'type' => 'gettext',
				'base_dir' => __DIR__ . '/../language',
				'pattern' => '%s.mo',
			),
		),
	),
	// add controlor
	'controllers' => array(
		'invokables' => array(
			'RealEstate\Controller\House' => 'RealEstate\Controller\HouseController',
			'RealEstate\Controller\Hello' => 'RealEstate\Controller\HelloController'
		),
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
		'display_exceptions' => true,
		'doctype' => 'HTML5',
		'not_found_template' => 'error/404',
		'exception_template' => 'error/index',
		'template_map' => array(
			'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
			'error/404' => __DIR__ . '/../view/error/404.phtml',
			'error/index' => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);
