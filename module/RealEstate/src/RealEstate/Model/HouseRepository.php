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
        
	public function selectByUid($houseUid) {

	}

}
