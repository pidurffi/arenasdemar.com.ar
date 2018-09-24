<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Console\Logger\ConsoleLogger;

/**
 * @ORM\Entity
 * @ORM\Table(name="galeria")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\GaleriaRepository")
 */
class Galeria
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
	 * @ORM\Column(type="array", nullable=true)
	 */
	protected $galeria;

	
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
     * @return Galeria
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
     * Set galeria
     *
     * @param array $galeria
     *
     * @return Galeria
     */
    public function setGaleria($galeria)
    {
        $this->galeria = $galeria;

        return $this;
    }

    /**
     * Get galeria
     *
     * @return array
     */
    public function getGaleria()
    {
        return $this->galeria;
    }

    
    public function __toString() {
    	return $this->getNombre(). " (".$this->getId().")";
    }
    
    public function getCantidadImagenes() {
        return sizeof($this->getGaleria());
    }
}
