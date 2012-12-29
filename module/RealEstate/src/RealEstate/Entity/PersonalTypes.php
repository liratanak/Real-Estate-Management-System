<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonalTypes
 *
 * @ORM\Table(name="personal_types")
 * @ORM\Entity
 */
class PersonalTypes
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;



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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * @return PersonalTypes
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
     * Set title
     *
     * @param string $title
     * @return PersonalTypes
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}