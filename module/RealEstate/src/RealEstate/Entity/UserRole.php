<?php

namespace RealEstate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity
 */
class UserRole
{
    /**
     * @var string
     *
     * @ORM\Column(name="role_id", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="default", type="boolean", nullable=false)
     */
    private $default;

    /**
     * @var string
     *
     * @ORM\Column(name="parent", type="string", length=255, nullable=true)
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="RealEstate\Entity\Permission", inversedBy="role")
     * @ORM\JoinTable(name="role_permission",
     *   joinColumns={
     *     @ORM\JoinColumn(name="role", referencedColumnName="role_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="permission", referencedColumnName="id")
     *   }
     * )
     */
    private $permission;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="RealEstate\Entity\User", mappedBy="role")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permission = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get roleId
     *
     * @return string 
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set default
     *
     * @param boolean $default
     * @return UserRole
     */
    public function setDefault($default)
    {
        $this->default = $default;
    
        return $this;
    }

    /**
     * Get default
     *
     * @return boolean 
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set parent
     *
     * @param string $parent
     * @return UserRole
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return string 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add permission
     *
     * @param \RealEstate\Entity\Permission $permission
     * @return UserRole
     */
    public function addPermission(\RealEstate\Entity\Permission $permission)
    {
        $this->permission[] = $permission;
    
        return $this;
    }

    /**
     * Remove permission
     *
     * @param \RealEstate\Entity\Permission $permission
     */
    public function removePermission(\RealEstate\Entity\Permission $permission)
    {
        $this->permission->removeElement($permission);
    }

    /**
     * Get permission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Add user
     *
     * @param \RealEstate\Entity\User $user
     * @return UserRole
     */
    public function addUser(\RealEstate\Entity\User $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \RealEstate\Entity\User $user
     */
    public function removeUser(\RealEstate\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}