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

		$select->from(array('h' => 'house'))
				->join(array('t' => 'house_type'), 'h.type=t.id')
				->join(array('a' => 'address'), 'h.address=a.id')
				->join(array('s' => 'size'), 'h.size=a.id')
				->join(array('u'=>'user'), 'h.user=u.id')
				->join(array('p'=>'personal_detail'), 'p.user=u.id')
				->where("h.id = " . "$houseUid");
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

	public function selectAddressById($houseUid) {
		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
		$select = $sql->select();

		$select->from(array('a' => 'address'))
				->where("a.id = " . "$houseUid");
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

	public function selectSizeById($houseUid) {
		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
		$select = $sql->select();


		$select->from(array('s' => 'sizes'), array('s.width', 's.height', 's.length'))
				->where("s.id = " . "$houseUid");
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;
	}

	public function listAll() {
		$adapter = $this->tableGateway->getAdapter();
		$sql = 'select h.id,h.is_room_rent, h.is_room_rent,h.last_modified_time as last_Update,t.title as Type,COUNT(r.id) as NumberofRooms, h.cost as houseCost, max(r.cost) as roomCostMax, min(r.cost) as roomCostMin, a.*
							from house as h
							left join room as r on h.id = r.house
							join address as a on h.address = a.id
							join house_type as t on h.type = t.id
							group by r.house
							order by h.last_modified_time';
		$statement = $adapter->query($sql);
		$resultSet = $statement->execute();
		return $resultSet;
	}

	public function countAll() {
		$adapter = $this->tableGateway->getAdapter();
		$sql = 'select count(id) as count from house';
		$statement = $adapter->query($sql);
		$resultSet = $statement->execute();

		return $resultSet;
	}

//	public function selectUserById($houseUid) {
//		$sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
//		$select = $sql->select();
//
//		$select->from(array('p'=>'personal_details'))
//				->join(array('u'=>'users'), 'p.userUid=u.id' )
//				->where("u.id = " . "$houseUid");
//		$statement = $sql->prepareStatementForSqlObject($select);
//		$results = $statement->execute();
//		return $results;
//	}
}
