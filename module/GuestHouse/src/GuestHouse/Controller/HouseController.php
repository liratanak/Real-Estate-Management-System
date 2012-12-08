<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace GuestHouse\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HouseController extends AbstractActionController {

	public function indexAction() {
		return new ViewModel();
	}

	public function helloAction() {
		return new ViewModel();
	}

	public function viewAction() {
		$slug = $this->params('slug');
		return new ViewModel(array(
			'slug' => $slug,
		));
	}

	public function rssAction() {
		return new ViewModel();
	}

}
