<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonGuestHouse for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace RealEstate;

return array(
	'router' => array(
		'routes' => array(
			'house-list' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/page/[:p]',
					'defaults' => array(
						'controller' => 'houseList',
						'action' => 'list',
					),
				),
			),
			'home' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/',
					'defaults' => array(
						'controller' => 'houseList',
						'action' => 'list',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/[:action]',
							'constraints' => array(
								'action' => '[a-zA-Z0-9_-]+'
							),
							'defaults' => array(
							),
						),
						'may_terminate' => true,
						'child_routes' => array(
							'default' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/[:pageNumber]',
									'constraints' => array(
										'pageNumber' => '[0-9]*',
									),
									'defaults' => array(
									),
								),
							),
						),
					),
				),
			),
			'houses' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/house',
					'defaults' => array(
						'controller' => 'house',
						'action' => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'houseUid' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/[:houseUid]',
							'constraints' => array(
								'houseUid' => '[a-zA-Z0-9_-]+'
							),
							'defaults' => array(
								'action' => 'viewDetail'
							)
						)
					),
				),
			),
			'search' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/search',
					'defaults' => array(
						'controller' => 'search',
						'action' => 'index',
					),
				),
			),
			'ajax' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/ajax',
					'defaults' => array(
						'controller' => 'ajax',
						'action' => 'ajax',
					),
				),
			),
			'message' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/message',
					'defaults' => array(
						'controller' => 'message',
						'action' => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/[:action]',
							'constraints' => array(
								'action' => '[a-zA-Z0-9_-]+'
							),
							'defaults' => array(
								'action' => 'index'
							)
						)
					),
				),
			),
			'create' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/new',
					'defaults' => array(
						'controller' => 'creator',
						'action' => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/[:action]',
							'constraints' => array(
								'action' => '[a-zA-Z0-9_-]+'
							),
							'defaults' => array(
								'action' => 'index'
							)
						)
					),
				),
			),
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
			'house' => 'RealEstate\Controller\HouseController',
			'houseList' => 'RealEstate\Controller\HousesListController',
			'search' => 'RealEstate\Controller\SearchController',
			'creator' => 'RealEstate\Controller\CreatorController',
			'ajax' => 'RealEstate\Controller\AjaxController',
			'message' => 'RealEstate\Controller\MessageController',
		),
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
		'display_exceptions' => true,
		'doctype' => 'HTML5',
		'not_found_template' => 'error/404',
		'exception_template' => 'error/index',
		'template_map' => array(
			'layout/layout' => __DIR__ . '/../view/layout/marketing-narrow.phtml',
			'error/404' => __DIR__ . '/../view/error/404.phtml',
			'error/index' => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
	'module_layouts' => array(
		'ZfcUserAdmin' => __DIR__ . '/../view/layout/marketing-narrow.phtml',
	),
	// Doctrine config
	'doctrine' => array(
		'driver' => array(
			__NAMESPACE__ . '_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
				),
			),
		),
	),
);
