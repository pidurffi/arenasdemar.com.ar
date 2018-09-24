<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="servicio")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ServicioRepository")
 */
class Servicio 
{
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
	 * @ORM\Column(type="text", nullable=false)
	 */
	private $descripcion;
	
	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $imagen;
	
	/**
	 * @ORM\Column(type="boolean", nullable=true)
	 */
	private $destacado;
	
	
	

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Establecimiento
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Establecimiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        
        return $this;
    }
    
    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Establecimiento
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
        
        return $this;
    }
    
    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }
    
    /**
     * Set destacado
     *
     * @param boolean $destacado
     *
     * @return Establecimiento
     */
    public function setDestacado($destacado)
    {
        $this->destacado = $destacado;
        
        return $this;
    }
    
    /**
     * Get destacado
     *
     * @return boolean
     */
    public function getDestacado()
    {
        return $this->destacado;
    }
    
}
