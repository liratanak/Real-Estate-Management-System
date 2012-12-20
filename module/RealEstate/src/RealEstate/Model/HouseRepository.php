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

	public function selectHouseById($houseUid) {
		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
		$select = $sql->select();

		$select->from(array('h'=>'houses'));
		$select->where("uid = " .$houseUid);
//		die($select->getSqlString());
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;

	}
}
