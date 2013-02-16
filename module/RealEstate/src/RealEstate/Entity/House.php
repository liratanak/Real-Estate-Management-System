<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * House
 *
 * @ORM\Table(name="house")
 * @ORM\Entity
 */
class House
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="pid", type="integer", nullable=true)
     */
    private $pid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hidden", type="boolean", nullable=true)
     */
    private $hidden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=true)
     */
    private $disabled;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=true)
     */
    private $deleted;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_time", type="integer", nullable=true)
     */
    private $createdTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_modified_time", type="integer", nullable=true)
     */
    private $lastModifiedTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid_time_start", type="integer", nullable=true)
     */
    private $validTimeStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid_time_end", type="integer", nullable=true)
     */
    private $validTimeEnd;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_room_rent", type="boolean", nullable=true)
     */
    private $isRoomRent;

    /**
     * @var integer
     *
     * @ORM\Column(name="cost", type="integer", nullable=true)
     */
    private $cost;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=true)
     */
    private $available;

    /**
     * @var integer
     *
     * @ORM\Column(name="positive_rate_number", type="integer", nullable=true)
     */
    private $positiveRateNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="negative_rate_number", type="integer", nullable=true)
     */
    private $negativeRateNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="image_path_as_json_string_list", type="text", nullable=true)
     */
    private $imagePathAsJsonStringList;

    /**
     * @var string
     *
     * @ORM\Column(name="other_info", type="text", nullable=true)
     */
    private $otherInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="search_term", type="text", nullable=true)
     */
    private $searchTerm;

    /**
     * @var \RealEstate\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_user", referencedColumnName="user_id")
     * })
     */
    private $createdUser;

    /**
     * @var \RealEstate\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="last_modified_user", referencedColumnName="user_id")
     * })
     */
    private $lastModifiedUser;

    /**
     * @var \RealEstate\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var \RealEstate\Entity\HouseType
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\HouseType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \RealEstate\Entity\Size
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\Size")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="size", referencedColumnName="id")
     * })
     */
    private $size;

    /**
     * @var \RealEstate\Entity\Address
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="id")
     * })
     */
    private $address;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pid
     *
     * @param integer $pid
     * @return House
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
     * @return House
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
     * @return House
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
     * @return House
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
     * Set createdTime
     *
     * @param integer $createdTime
     * @return House
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    
        return $this;
    }

    /**
     * Get createdTime
     *
     * @return integer 
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * Set lastModifiedTime
     *
     * @param integer $lastModifiedTime
     * @return House
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    
        return $this;
    }

    /**
     * Get lastModifiedTime
     *
     * @return integer 
     */
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * Set validTimeStart
     *
     * @param integer $validTimeStart
     * @return House
     */
    public function setValidTimeStart($validTimeStart)
    {
        $this->validTimeStart = $validTimeStart;
    
        return $this;
    }

    /**
     * Get validTimeStart
     *
     * @return integer 
     */
    public function getValidTimeStart()
    {
        return $this->validTimeStart;
    }

    /**
     * Set validTimeEnd
     *
     * @param integer $validTimeEnd
     * @return House
     */
    public function setValidTimeEnd($validTimeEnd)
    {
        $this->validTimeEnd = $validTimeEnd;
    
        return $this;
    }

    /**
     * Get validTimeEnd
     *
     * @return integer 
     */
    public function getValidTimeEnd()
    {
        return $this->validTimeEnd;
    }

    /**
     * Set isRoomRent
     *
     * @param boolean $isRoomRent
     * @return House
     */
    public function setIsRoomRent($isRoomRent)
    {
        $this->isRoomRent = $isRoomRent;
    
        return $this;
    }

    /**
     * Get isRoomRent
     *
     * @return boolean 
     */
    public function getIsRoomRent()
    {
        return $this->isRoomRent;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return House
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
     * @return House
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
     * Set positiveRateNumber
     *
     * @param integer $positiveRateNumber
     * @return House
     */
    public function setPositiveRateNumber($positiveRateNumber)
    {
        $this->positiveRateNumber = $positiveRateNumber;
    
        return $this;
    }

    /**
     * Get positiveRateNumber
     *
     * @return integer 
     */
    public function getPositiveRateNumber()
    {
        return $this->positiveRateNumber;
    }

    /**
     * Set negativeRateNumber
     *
     * @param integer $negativeRateNumber
     * @return House
     */
    public function setNegativeRateNumber($negativeRateNumber)
    {
        $this->negativeRateNumber = $negativeRateNumber;
    
        return $this;
    }

    /**
     * Get negativeRateNumber
     *
     * @return integer 
     */
    public function getNegativeRateNumber()
    {
        return $this->negativeRateNumber;
    }

    /**
     * Set imagePathAsJsonStringList
     *
     * @param string $imagePathAsJsonStringList
     * @return House
     */
    public function setImagePathAsJsonStringList($imagePathAsJsonStringList)
    {
        $this->imagePathAsJsonStringList = $imagePathAsJsonStringList;
    
        return $this;
    }

    /**
     * Get imagePathAsJsonStringList
     *
     * @return string 
     */
    public function getImagePathAsJsonStringList()
    {
        return $this->imagePathAsJsonStringList;
    }

    /**
     * Set otherInfo
     *
     * @param string $otherInfo
     * @return House
     */
    public function setOtherInfo($otherInfo)
    {
        $this->otherInfo = $otherInfo;
    
        return $this;
    }

    /**
     * Get otherInfo
     *
     * @return string 
     */
    public function getOtherInfo()
    {
        return $this->otherInfo;
    }

    /**
     * Set searchTerm
     *
     * @param string $searchTerm
     * @return House
     */
    public function setSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    
        return $this;
    }

    /**
     * Get searchTerm
     *
     * @return string 
     */
    public function getSearchTerm()
    {
        return $this->searchTerm;
    }

    /**
     * Set createdUser
     *
     * @param \RealEstate\Entity\User $createdUser
     * @return House
     */
    public function setCreatedUser(\RealEstate\Entity\User $createdUser = null)
    {
        $this->createdUser = $createdUser;
    
        return $this;
    }

    /**
     * Get createdUser
     *
     * @return \RealEstate\Entity\User 
     */
    public function getCreatedUser()
    {
        return $this->createdUser;
    }

    /**
     * Set lastModifiedUser
     *
     * @param \RealEstate\Entity\User $lastModifiedUser
     * @return House
     */
    public function setLastModifiedUser(\RealEstate\Entity\User $lastModifiedUser = null)
    {
        $this->lastModifiedUser = $lastModifiedUser;
    
        return $this;
    }

    /**
     * Get lastModifiedUser
     *
     * @return \RealEstate\Entity\User 
     */
    public function getLastModifiedUser()
    {
        return $this->lastModifiedUser;
    }

    /**
     * Set user
     *
     * @param \RealEstate\Entity\User $user
     * @return House
     */
    public function setUser(\RealEstate\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \RealEstate\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set type
     *
     * @param \RealEstate\Entity\HouseType $type
     * @return House
     */
    public function setType(\RealEstate\Entity\HouseType $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \RealEstate\Entity\HouseType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set size
     *
     * @param \RealEstate\Entity\Size $size
     * @return House
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
     * Set address
     *
     * @param \RealEstate\Entity\Address $address
     * @return House
     */
    public function setAddress(\RealEstate\Entity\Address $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \RealEstate\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }
}