<?php

return array(
	'modules' => array(
		'ZfcBase',
		'ZfcUser',
		'BjyAuthorize',
		'DoctrineModule',
		'DoctrineORMModule',
		'ZfcUserDoctrineORM',
		'ZfcAdmin',
		'ZfcUserAdmin',
		'RealEstate',
	),
	'module_listener_options' => array(
		'config_glob_paths' => array(
			'config/autoload/{,*.}{global,local}.php',
		),
		'module_paths' => array(
			'./module',
			'./vendor',
		),
	),
);
