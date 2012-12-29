<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonalDetails
 *
 * @ORM\Table(name="personal_details")
 * @ORM\Entity
 */
class PersonalDetails
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
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=50, nullable=false)
     */
    private $job;

    /**
     * @var boolean
     *
     * @ORM\Column(name="age", type="boolean", nullable=false)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber1", type="string", length=50, nullable=false)
     */
    private $phonenumber1;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber2", type="string", length=50, nullable=false)
     */
    private $phonenumber2;

    /**
     * @var string
     *
     * @ORM\Column(name="others", type="text", nullable=false)
     */
    private $others;

    /**
     * @var integer
     *
     * @ORM\Column(name="userUid", type="integer", nullable=false)
     */
    private $useruid;

    /**
     * @var integer
     *
     * @ORM\Column(name="personalTypeUid", type="integer", nullable=false)
     */
    private $personaltypeuid;



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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * @return PersonalDetails
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
     * Set firstname
     *
     * @param string $firstname
     * @return PersonalDetails
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return PersonalDetails
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return PersonalDetails
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return PersonalDetails
     */
    public function setJob($job)
    {
        $this->job = $job;
    
        return $this;
    }

    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set age
     *
     * @param boolean $age
     * @return PersonalDetails
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return boolean 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return PersonalDetails
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phonenumber1
     *
     * @param string $phonenumber1
     * @return PersonalDetails
     */
    public function setPhonenumber1($phonenumber1)
    {
        $this->phonenumber1 = $phonenumber1;
    
        return $this;
    }

    /**
     * Get phonenumber1
     *
     * @return string 
     */
    public function getPhonenumber1()
    {
        return $this->phonenumber1;
    }

    /**
     * Set phonenumber2
     *
     * @param string $phonenumber2
     * @return PersonalDetails
     */
    public function setPhonenumber2($phonenumber2)
    {
        $this->phonenumber2 = $phonenumber2;
    
        return $this;
    }

    /**
     * Get phonenumber2
     *
     * @return string 
     */
    public function getPhonenumber2()
    {
        return $this->phonenumber2;
    }

    /**
     * Set others
     *
     * @param string $others
     * @return PersonalDetails
     */
    public function setOthers($others)
    {
        $this->others = $others;
    
        return $this;
    }

    /**
     * Get others
     *
     * @return string 
     */
    public function getOthers()
    {
        return $this->others;
    }

    /**
     * Set useruid
     *
     * @param integer $useruid
     * @return PersonalDetails
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
     * Set personaltypeuid
     *
     * @param integer $personaltypeuid
     * @return PersonalDetails
     */
    public function setPersonaltypeuid($personaltypeuid)
    {
        $this->personaltypeuid = $personaltypeuid;
    
        return $this;
    }

    /**
     * Get personaltypeuid
     *
     * @return integer 
     */
    public function getPersonaltypeuid()
    {
        return $this->personaltypeuid;
    }
}