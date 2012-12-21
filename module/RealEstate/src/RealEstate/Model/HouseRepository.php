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

		$select->from(array('h' => 'houses'))
//				->join(array('t' => 'house_types'), 'h.typeUid=t.uid')
//				->join(array('a' => 'address'), 'h.addressUid=a.uid')
//				->join(array('s' => 'sizes'), 'h.sizeUid=a.uid')
				->where("h.uid = " . "$houseUid");
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

	public function selectAddressById($houseUid) {
		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
		$select = $sql->select();

		$select->from(array('a' => 'address'))
				->where("a.uid = " . "$houseUid");
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

	public function selectSizeById($houseUid) {
		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
		$select = $sql->select();

		$select->from(array('s' => 'sizes'), array('s.width', 's.height', 's.length'))
				->where("s.uid = " . "$houseUid");
//		die($select);
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

//	public function selectUserById($houseUid) {
//		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
//		$select = $sql->select();
//
//		$select->from(array('u'=>'users'),
//						array('u'=>'users'))
//				->where("u.uid = " . "$houseUid");
//		$statement = $sql->prepareStatementForSqlObject($select);
//		$results = $statement->execute();
//		return $results;
//	}
}
