<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZfcUser\Entity\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="user_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $userId;

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
	 * @var string
	 *
	 * @ORM\Column(name="username", type="string", length=64, nullable=true)
	 */
	private $username;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255, nullable=true)
	 */
	private $password;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="display_name", type="string", length=50, nullable=true)
	 */
	private $displayName;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="gender", type="string", length=10, nullable=true)
	 */
	private $gender;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=64, nullable=true)
	 */
	private $email;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="last_login_time", type="integer", nullable=true)
	 */
	private $lastLoginTime;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="state", type="smallint", nullable=true)
	 */
	private $state;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="RealEstate\Entity\UserRole", inversedBy="user")
	 * @ORM\JoinTable(name="user_role_linker",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="role_id", referencedColumnName="role_id")
	 *   }
	 * )
	 */
	private $role;

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
	 *   @ORM\JoinColumn(name="created_user", referencedColumnName="user_id")
	 * })
	 */
	private $createdUser;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->role = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get userId
	 *
	 * @return integer 
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * Set pid
	 *
	 * @param integer $pid
	 * @return User
	 */
	public function setPid($pid) {
		$this->pid = $pid;

		return $this;
	}

	/**
	 * Get pid
	 *
	 * @return integer 
	 */
	public function getPid() {
		return $this->pid;
	}

	/**
	 * Set hidden
	 *
	 * @param boolean $hidden
	 * @return User
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;

		return $this;
	}

	/**
	 * Get hidden
	 *
	 * @return boolean 
	 */
	public function getHidden() {
		return $this->hidden;
	}

	/**
	 * Set disabled
	 *
	 * @param boolean $disabled
	 * @return User
	 */
	public function setDisabled($disabled) {
		$this->disabled = $disabled;

		return $this;
	}

	/**
	 * Get disabled
	 *
	 * @return boolean 
	 */
	public function getDisabled() {
		return $this->disabled;
	}

	/**
	 * Set deleted
	 *
	 * @param boolean $deleted
	 * @return User
	 */
	public function setDeleted($deleted) {
		$this->deleted = $deleted;

		return $this;
	}

	/**
	 * Get deleted
	 *
	 * @return boolean 
	 */
	public function getDeleted() {
		return $this->deleted;
	}

	/**
	 * Set createdTime
	 *
	 * @param integer $createdTime
	 * @return User
	 */
	public function setCreatedTime($createdTime) {
		$this->createdTime = $createdTime;

		return $this;
	}

	/**
	 * Get createdTime
	 *
	 * @return integer 
	 */
	public function getCreatedTime() {
		return $this->createdTime;
	}

	/**
	 * Set lastModifiedTime
	 *
	 * @param integer $lastModifiedTime
	 * @return User
	 */
	public function setLastModifiedTime($lastModifiedTime) {
		$this->lastModifiedTime = $lastModifiedTime;

		return $this;
	}

	/**
	 * Get lastModifiedTime
	 *
	 * @return integer 
	 */
	public function getLastModifiedTime() {
		return $this->lastModifiedTime;
	}

	/**
	 * Set validTimeStart
	 *
	 * @param integer $validTimeStart
	 * @return User
	 */
	public function setValidTimeStart($validTimeStart) {
		$this->validTimeStart = $validTimeStart;

		return $this;
	}

	/**
	 * Get validTimeStart
	 *
	 * @return integer 
	 */
	public function getValidTimeStart() {
		return $this->validTimeStart;
	}

	/**
	 * Set validTimeEnd
	 *
	 * @param integer $validTimeEnd
	 * @return User
	 */
	public function setValidTimeEnd($validTimeEnd) {
		$this->validTimeEnd = $validTimeEnd;

		return $this;
	}

	/**
	 * Get validTimeEnd
	 *
	 * @return integer 
	 */
	public function getValidTimeEnd() {
		return $this->validTimeEnd;
	}

	/**
	 * Set username
	 *
	 * @param string $username
	 * @return User
	 */
	public function setUsername($username) {
		$this->username = $username;

		return $this;
	}

	/**
	 * Get username
	 *
	 * @return string 
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 * @return User
	 */
	public function setPassword($password) {
		$this->password = $password;

		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string 
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Set displayName
	 *
	 * @param string $displayName
	 * @return User
	 */
	public function setDisplayName($displayName) {
		$this->displayName = $displayName;

		return $this;
	}

	/**
	 * Get displayName
	 *
	 * @return string 
	 */
	public function getDisplayName() {
		return $this->displayName;
	}

	/**
	 * Set gender
	 *
	 * @param string $gender
	 * @return User
	 */
	public function setGender($gender) {
		$this->gender = $gender;

		return $this;
	}

	/**
	 * Get gender
	 *
	 * @return string 
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 * @return User
	 */
	public function setEmail($email) {
		$this->email = $email;

		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string 
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Set lastLoginTime
	 *
	 * @param integer $lastLoginTime
	 * @return User
	 */
	public function setLastLoginTime($lastLoginTime) {
		$this->lastLoginTime = $lastLoginTime;

		return $this;
	}

	/**
	 * Get lastLoginTime
	 *
	 * @return integer 
	 */
	public function getLastLoginTime() {
		return $this->lastLoginTime;
	}

	/**
	 * Set state
	 *
	 * @param integer $state
	 * @return User
	 */
	public function setState($state) {
		$this->state = $state;

		return $this;
	}

	/**
	 * Get state
	 *
	 * @return integer 
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Add role
	 *
	 * @param \RealEstate\Entity\UserRole $role
	 * @return User
	 */
	public function addRole(\RealEstate\Entity\UserRole $role) {
		$this->role[] = $role;

		return $this;
	}

	/**
	 * Remove role
	 *
	 * @param \RealEstate\Entity\UserRole $role
	 */
	public function removeRole(\RealEstate\Entity\UserRole $role) {
		$this->role->removeElement($role);
	}

	/**
	 * Get role
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * Set lastModifiedUser
	 *
	 * @param \RealEstate\Entity\User $lastModifiedUser
	 * @return User
	 */
	public function setLastModifiedUser(\RealEstate\Entity\User $lastModifiedUser = null) {
		$this->lastModifiedUser = $lastModifiedUser;

		return $this;
	}

	/**
	 * Get lastModifiedUser
	 *
	 * @return \RealEstate\Entity\User 
	 */
	public function getLastModifiedUser() {
		return $this->lastModifiedUser;
	}

	/**
	 * Set createdUser
	 *
	 * @param \RealEstate\Entity\User $createdUser
	 * @return User
	 */
	public function setCreatedUser(\RealEstate\Entity\User $createdUser = null) {
		$this->createdUser = $createdUser;

		return $this;
	}

	/**
	 * Get createdUser
	 *
	 * @return \RealEstate\Entity\User 
	 */
	public function getCreatedUser() {
		return $this->createdUser;
	}

	public function getId() {
		return $this->userId;
	}

	public function setId($id) {
		$this->userId = $id;
	}

}