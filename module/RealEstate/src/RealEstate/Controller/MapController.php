<?php

namespace RealEstate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use GoogleMaps\Request as MapRequest;

class MapController extends AbstractActionController {

	public function indexAction() {
		$lat = 40.714224;
		$lng = -73.961452;
		$request = new MapRequest();

		$latlng = array(
			'lat' => $lat,
			'lng' => $lng,
		);
		
		$latLng = new \GoogleMaps\Resources\LatLng($latlng);

		$request->setLatLng(new \GoogleMaps\Parameters\LatLngParameter($latLng));
		$proxy = new \GoogleMaps\Geocoder();
		$response = $proxy->geocode($request);

		var_dump($response);
		return new ViewModel(array(
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
