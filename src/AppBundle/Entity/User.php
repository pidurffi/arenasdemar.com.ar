<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Avanzu\AdminThemeBundle\Model\UserInterface as ThemeUser;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\UserRepository")
 */
class User extends BaseUser  implements ThemeUser
{
    const ROLE_USER = "ROLE_USER";
    const ROLE_ADMIN_ESTABLECIMIENTO = "ROLE_ADMIN_ESTABLECIMIENTO";
    const ROLE_SUPER_ADMIN = "ROLE_SUPER_ADMIN";
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apellido;
    
    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;
    
    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contacto;
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->getId()) {
            $this->created = new \DateTime();
            $this->updated = new \DateTime();
        }
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return User
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return User
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     *
     * @return User
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string
     */
    public function getContacto()
    {
        return $this->contacto;
    }
    
    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
    
    public function getExpiresAt()
    {
    	return $this->expiresAt;
    }
    
    public function getCredentialsExpireAt()
    {
    	return $this->credentialsExpireAt;
    }
    
    public function getAvatar() {
        return "https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg";
    }
    
    public function getName() {
        return $this->getNombre()." ".$this->getApellido();
    }
    
    public function getMemberSince() {
        return $this->getCreated();
    }
    
    public function isOnline() {
        return true;
    }
    
    public function getIdentifier() {
        return $this->getId();
    }
    
    public function getTitle() {
        return "Administrador de Sitio Web";
    }
    	
}
