<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 */
class Message
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
     * @ORM\Column(name="content", type="boolean", nullable=true)
     */
    private $content;

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
     *   @ORM\JoinColumn(name="fromUser", referencedColumnName="user_id")
     * })
     */
    private $fromuser;

    /**
     * @var \RealEstate\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="RealEstate\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="toUser", referencedColumnName="user_id")
     * })
     */
    private $touser;



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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * Set content
     *
     * @param boolean $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return boolean 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdUser
     *
     * @param \RealEstate\Entity\User $createdUser
     * @return Message
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
     * @return Message
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
     * Set fromuser
     *
     * @param \RealEstate\Entity\User $fromuser
     * @return Message
     */
    public function setFromuser(\RealEstate\Entity\User $fromuser = null)
    {
        $this->fromuser = $fromuser;
    
        return $this;
    }

    /**
     * Get fromuser
     *
     * @return \RealEstate\Entity\User 
     */
    public function getFromuser()
    {
        return $this->fromuser;
    }

    /**
     * Set touser
     *
     * @param \RealEstate\Entity\User $touser
     * @return Message
     */
    public function setTouser(\RealEstate\Entity\User $touser = null)
    {
        $this->touser = $touser;
    
        return $this;
    }

    /**
     * Get touser
     *
     * @return \RealEstate\Entity\User 
     */
    public function getTouser()
    {
        return $this->touser;
    }
}