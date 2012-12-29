<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity
 */
class Room
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
     * @var integer
     *
     * @ORM\Column(name="roomNumber", type="integer", nullable=false)
     */
    private $roomnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="cost", type="integer", nullable=false)
     */
    private $cost;

    /**
     * @var boolean
     *
     * @ORM\Column(name="toilet", type="boolean", nullable=false)
     */
    private $toilet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="kitchen", type="boolean", nullable=false)
     */
    private $kitchen;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=false)
     */
    private $available;

    /**
     * @var string
     *
     * @ORM\Column(name="imagePathJsonStringList", type="text", nullable=false)
     */
    private $imagepathjsonstringlist;

    /**
     * @var \RealEstate\Entity\Size
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\Size")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="size", referencedColumnName="uid")
     * })
     */
    private $size;

    /**
     * @var \RealEstate\Entity\House
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\House")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="house", referencedColumnName="uid")
     * })
     */
    private $house;



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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * @return Room
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
     * Set roomnumber
     *
     * @param integer $roomnumber
     * @return Room
     */
    public function setRoomnumber($roomnumber)
    {
        $this->roomnumber = $roomnumber;
    
        return $this;
    }

    /**
     * Get roomnumber
     *
     * @return integer 
     */
    public function getRoomnumber()
    {
        return $this->roomnumber;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return Room
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
     * Set toilet
     *
     * @param boolean $toilet
     * @return Room
     */
    public function setToilet($toilet)
    {
        $this->toilet = $toilet;
    
        return $this;
    }

    /**
     * Get toilet
     *
     * @return boolean 
     */
    public function getToilet()
    {
        return $this->toilet;
    }

    /**
     * Set kitchen
     *
     * @param boolean $kitchen
     * @return Room
     */
    public function setKitchen($kitchen)
    {
        $this->kitchen = $kitchen;
    
        return $this;
    }

    /**
     * Get kitchen
     *
     * @return boolean 
     */
    public function getKitchen()
    {
        return $this->kitchen;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return Room
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
     * Set imagepathjsonstringlist
     *
     * @param string $imagepathjsonstringlist
     * @return Room
     */
    public function setImagepathjsonstringlist($imagepathjsonstringlist)
    {
        $this->imagepathjsonstringlist = $imagepathjsonstringlist;
    
        return $this;
    }

    /**
     * Get imagepathjsonstringlist
     *
     * @return string 
     */
    public function getImagepathjsonstringlist()
    {
        return $this->imagepathjsonstringlist;
    }

    /**
     * Set size
     *
     * @param \RealEstate\Entity\Size $size
     * @return Room
     */
    public function setSize(\RealEstate\Entity\Size $size = null)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return \RealEstate\Entity\Size 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set house
     *
     * @param \RealEstate\Entity\House $house
     * @return Room
     */
    public function setHouse(\RealEstate\Entity\House $house = null)
    {
        $this->house = $house;
    
        return $this;
    }

    /**
     * Get house
     *
     * @return \RealEstate\Entity\House 
     */
    public function getHouse()
    {
        return $this->house;
    }
}