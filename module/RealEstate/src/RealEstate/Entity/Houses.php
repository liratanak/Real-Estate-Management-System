<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Houses
 *
 * @ORM\Table(name="houses")
 * @ORM\Entity
 */
class Houses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uid;

    /**
     * @var integer
     *
     * @ORM\Column(name="pid", type="integer", nullable=false)
     */
    private $pid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hidden", type="boolean", nullable=false)
     */
    private $hidden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=false)
     */
    private $disabled;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted;

    /**
     * @var integer
     *
     * @ORM\Column(name="createdTime", type="integer", nullable=false)
     */
    private $createdtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="createdUserUid", type="integer", nullable=false)
     */
    private $createduseruid;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastModifiedTime", type="integer", nullable=false)
     */
    private $lastmodifiedtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastModifiedUserUid", type="integer", nullable=false)
     */
    private $lastmodifieduseruid;

    /**
     * @var integer
     *
     * @ORM\Column(name="validTimeStart", type="integer", nullable=false)
     */
    private $validtimestart;

    /**
     * @var integer
     *
     * @ORM\Column(name="validTimeEnd", type="integer", nullable=false)
     */
    private $validtimeend;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isRoomRent", type="boolean", nullable=false)
     */
    private $isroomrent;

    /**
     * @var integer
     *
     * @ORM\Column(name="cost", type="integer", nullable=false)
     */
    private $cost;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=false)
     */
    private $available;

    /**
     * @var string
     *
     * @ORM\Column(name="otherInfo", type="text", nullable=false)
     */
    private $otherinfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="userUid", type="integer", nullable=false)
     */
    private $useruid;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeUid", type="integer", nullable=false)
     */
    private $typeuid;

    /**
     * @var integer
     *
     * @ORM\Column(name="sizeUid", type="integer", nullable=false)
     */
    private $sizeuid;

    /**
     * @var integer
     *
     * @ORM\Column(name="addressUid", type="integer", nullable=false)
     */
    private $addressuid;



    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set pid
     *
     * @param integer $pid
     * @return Houses
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    
        return $this;
    }

    /**
     * Get pid
     *
     * @return integer 
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set hidden
     *
     * @param boolean $hidden
     * @return Houses
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    
        return $this;
    }

    /**
     * Get hidden
     *
     * @return boolean 
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set disabled
     *
     * @param boolean $disabled
     * @return Houses
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    
        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean 
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Houses
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set createdtime
     *
     * @param integer $createdtime
     * @return Houses
     */
    public function setCreatedtime($createdtime)
    {
        $this->createdtime = $createdtime;
    
        return $this;
    }

    /**
     * Get createdtime
     *
     * @return integer 
     */
    public function getCreatedtime()
    {
        return $this->createdtime;
    }

    /**
     * Set createduseruid
     *
     * @param integer $createduseruid
     * @return Houses
     */
    public function setCreateduseruid($createduseruid)
    {
        $this->createduseruid = $createduseruid;
    
        return $this;
    }

    /**
     * Get createduseruid
     *
     * @return integer 
     */
    public function getCreateduseruid()
    {
        return $this->createduseruid;
    }

    /**
     * Set lastmodifiedtime
     *
     * @param integer $lastmodifiedtime
     * @return Houses
     */
    public function setLastmodifiedtime($lastmodifiedtime)
    {
        $this->lastmodifiedtime = $lastmodifiedtime;
    
        return $this;
    }

    /**
     * Get lastmodifiedtime
     *
     * @return integer 
     */
    public function getLastmodifiedtime()
    {
        return $this->lastmodifiedtime;
    }

    /**
     * Set lastmodifieduseruid
     *
     * @param integer $lastmodifieduseruid
     * @return Houses
     */
    public function setLastmodifieduseruid($lastmodifieduseruid)
    {
        $this->lastmodifieduseruid = $lastmodifieduseruid;
    
        return $this;
    }

    /**
     * Get lastmodifieduseruid
     *
     * @return integer 
     */
    public function getLastmodifieduseruid()
    {
        return $this->lastmodifieduseruid;
    }

    /**
     * Set validtimestart
     *
     * @param integer $validtimestart
     * @return Houses
     */
    public function setValidtimestart($validtimestart)
    {
        $this->validtimestart = $validtimestart;
    
        return $this;
    }

    /**
     * Get validtimestart
     *
     * @return integer 
     */
    public function getValidtimestart()
    {
        return $this->validtimestart;
    }

    /**
     * Set validtimeend
     *
     * @param integer $validtimeend
     * @return Houses
     */
    public function setValidtimeend($validtimeend)
    {
        $this->validtimeend = $validtimeend;
    
        return $this;
    }

    /**
     * Get validtimeend
     *
     * @return integer 
     */
    public function getValidtimeend()
    {
        return $this->validtimeend;
    }

    /**
     * Set isroomrent
     *
     * @param boolean $isroomrent
     * @return Houses
     */
    public function setIsroomrent($isroomrent)
    {
        $this->isroomrent = $isroomrent;
    
        return $this;
    }

    /**
     * Get isroomrent
     *
     * @return boolean 
     */
    public function getIsroomrent()
    {
        return $this->isroomrent;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return Houses
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    
        return $this;
    }

    /**
     * Get cost
     *
     * @return integer 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return Houses
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    
        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set otherinfo
     *
     * @param string $otherinfo
     * @return Houses
     */
    public function setOtherinfo($otherinfo)
    {
        $this->otherinfo = $otherinfo;
    
        return $this;
    }

    /**
     * Get otherinfo
     *
     * @return string 
     */
    public function getOtherinfo()
    {
        return $this->otherinfo;
    }

    /**
     * Set useruid
     *
     * @param integer $useruid
     * @return Houses
     */
    public function setUseruid($useruid)
    {
        $this->useruid = $useruid;
    
        return $this;
    }

    /**
     * Get useruid
     *
     * @return integer 
     */
    public function getUseruid()
    {
        return $this->useruid;
    }

    /**
     * Set typeuid
     *
     * @param integer $typeuid
     * @return Houses
     */
    public function setTypeuid($typeuid)
    {
        $this->typeuid = $typeuid;
    
        return $this;
    }

    /**
     * Get typeuid
     *
     * @return integer 
     */
    public function getTypeuid()
    {
        return $this->typeuid;
    }

    /**
     * Set sizeuid
     *
     * @param integer $sizeuid
     * @return Houses
     */
    public function setSizeuid($sizeuid)
    {
        $this->sizeuid = $sizeuid;
    
        return $this;
    }

    /**
     * Get sizeuid
     *
     * @return integer 
     */
    public function getSizeuid()
    {
        return $this->sizeuid;
    }

    /**
     * Set addressuid
     *
     * @param integer $addressuid
     * @return Houses
     */
    public function setAddressuid($addressuid)
    {
        $this->addressuid = $addressuid;
    
        return $this;
    }

    /**
     * Get addressuid
     *
     * @return integer 
     */
    public function getAddressuid()
    {
        return $this->addressuid;
    }
}