<?php

namespace RealEstate\Model;

use Zend\Db\TableGateway\TableGateway;

class HouseRepository {

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function findAll() {
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function selectByUid($houseUid) {

	}

}
