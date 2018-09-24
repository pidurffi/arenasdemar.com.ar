<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SitioController extends Controller {
    
    /**
     * @Template("AppBundle:Sitio:home.html.twig")
     */
    public function indexAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:resena-institucional.html.twig")
     */
    public function resenaInstitucionalAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:mision.html.twig")
     */
    public function misionAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:internacion-general.html.twig")
     */
    public function internacionGeneralAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:guardia-clinica-medica.html.twig")
     */
    public function guardiaClinicaMedicaAction(Request $request)
    {
        return array('');
    }

    /**
     * @Template("AppBundle:Sitio:guardia-traumatologia.html.twig")
     */
    public function guardiaTraumatologiaAction(Request $request)
    {
        return array('');
    }

    /**
     * @Template("AppBundle:Sitio:guardia-neonatologia.html.twig")
     */
    public function guardiaNeonatologiaAction(Request $request)
    {
        return array('');
    }

    /**
     * @Template("AppBundle:Sitio:guardia-pedriatria.html.twig")
     */
    public function guardiaPediatriaAction(Request $request)
    {
        return array('');
    }

    /**
     * @Template("AppBundle:Sitio:guardia-ginecologia.html.twig")
     */
    public function guardiaGinecologiaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:centro-quirurgico.html.twig")
     */
    public function centroQuirurgicoAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:neonatologia.html.twig")
     */
    public function neonatologiaAction(Request $request)
    {
        return array('');
    }

    /**
     * @Template("AppBundle:Sitio:mamografia.html.twig")
     */
    public function mamografiaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:terapia-intensiva.html.twig")
     */
    public function terapiaIntensivaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:cardiologia-consultorios-externos.html.twig")
     */
    public function cardiologiaConsultorioExternosAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:cardiologia-estudios.html.twig")
     */
    public function cardiologiaEstudiosAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:hemodinamia.html.twig")
     */
    public function hemodinamiaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:cirugia-cardiovascular.html.twig")
     */
    public function cirugiaCardiovascularAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:hemoterapia.html.twig")
     */
    public function hemoterapiaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:kinesiologia.html.twig")
     */
    public function kinesiologiaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:oftalmologia.html.twig")
     */
    public function oftalmologiaAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:laboratorio.html.twig")
     */
    public function laboratorioAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:diagnostico-por-imagenes.html.twig")
     */
    public function diagnosticoPorImagenesAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Sitio:galeria.html.twig")
     */
    public function galeriaAction(Request $request)
    {
        $galeria = $this->getDoctrine()->getRepository('AppBundle:Galeria')->find(1);
        return array('galeria'=>$galeria);
    }
    
    /**
     * @Template("AppBundle:Sitio:coberturas.html.twig")
     */
    public function coberturasAction(Request $request)
    {
        $obras = $this->getDoctrine()->getRepository('AppBundle:ObraSocial')->findAll();
        
        return array('obras'=>$obras);
    }
    
    /**
     * @Template("AppBundle:Sitio:turnos.html.twig")
     */
    public function turnosAction(Request $request)
    {
        return array();
    }
    
    /**
     * @Template("AppBundle:Sitio:como-llegar.html.twig")
     */
    public function comoLlegarAction(Request $request)
    {
        return array();
    }
    
    /**
     * @Template("AppBundle:Sitio:servicios-profesionales.html.twig")
     */
    public function serviciosProfesionalesAction(Request $request)
    {
        $servicios = $this->getDoctrine()->getRepository('AppBundle:Servicio')->findAll();
        
        return array('servicios'=>$servicios);
    }
    
    /**
     * @Template("AppBundle:Sitio:informacion-pacientes.html.twig")
     */
    public function informacionPacientesAction(Request $request)
    {
        return array();
    }


    /**
     * @Template("AppBundle:Sitio:template-galeria.html.twig")
     */
    public function templateGaleriaAction($id_galeria)
    {
        $galeria = $this->getDoctrine()->getRepository('AppBundle:Galeria')->find($id_galeria);
        
        return array('galeria'=>$galeria);
    }
    
}
