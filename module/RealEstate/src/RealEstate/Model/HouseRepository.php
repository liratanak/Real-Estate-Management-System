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
				->join(array('t' => 'house_types'), 'h.typeUid=t.uid')
				->join(array('a' => 'address'), 'h.addressUid=a.uid')
				->join(array('s' => 'sizes'), 'h.sizeUid=a.uid')
				->join(array('u'=>'users'), 'h.userUid=u.uid')
				->join(array('p'=>'personal_details'), 'p.userUid=u.uid')
				->where("h.uid = " . "$houseUid");
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

//	public function selectAddressById($houseUid) {
//		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
//		$select = $sql->select();
//
//		$select->from(array('a' => 'address'))
//				->where("a.uid = " . "$houseUid");
//		$statement = $sql->prepareStatementForSqlObject($select);
//		$results = $statement->execute();
//		return $results;
//	}

//	public function selectSizeById($houseUid) {
//		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
//		$select = $sql->select();
//
//
//		$select->from(array('s' => 'sizes'), array('s.width', 's.height', 's.length'))
//				->where("s.uid = " . "$houseUid");
//		$statement = $sql->prepareStatementForSqlObject($select);
//		$results = $statement->execute();
//		return $results;
//	}

	public function listAll() {
		$adapter = $this->tableGateway->getAdapter();
		$sql = 'select h.uid,h.isRoomRent,h.lastModifiedTime as lastUpdate,t.title as Type,COUNT(r.uid) as NumberofRooms, h.cost as houseCost, max(r.cost) as roomCostMax, min(r.cost) as roomCostMin, a.*
                        from houses as h
                        left join rooms as r on h.uid = r.houseUid
                        join address as a on h.addressUid = a.uid
                        join house_types as t on h.typeUid = t.uid
                        group by r.houseUid
                        order by h.lastModifiedTime';
		$statement = $adapter->query($sql);
		$resultSet = $statement->execute();

		return $resultSet;
	}

	public function countAll() {
		$adapter = $this->tableGateway->getAdapter();
		$sql = 'select count(uid) as count from houses';
		$statement = $adapter->query($sql);
		$resultSet = $statement->execute();

		return $resultSet;
	}

//	public function selectUserById($houseUid) {
//		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
//		$select = $sql->select();
//
//		$select->from(array('p'=>'personal_details'))
//				->join(array('u'=>'users'), 'p.userUid=u.uid' )
//				->where("u.uid = " . "$houseUid");
//		$statement = $sql->prepareStatementForSqlObject($select);
//		$results = $statement->execute();
//		return $results;
//	}
}
