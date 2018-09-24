<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Form\PerfilType;
use AppBundle\Entity\Servicio;
use AppBundle\Form\ServicioType;
use AppBundle\Entity\ObraSocial;
use AppBundle\Form\ObraSocialType;
use AppBundle\Entity\Galeria;
use AppBundle\Form\GaleriaType;

class PanelController extends PanelBaseController
{
    /**
     * @Template("AppBundle:Varios:home.html.twig")
     */
    public function indexAction(Request $request)
    {
        return array('');
    }
    
    /**
     * @Template("AppBundle:Usuario:perfil.html.twig")
     */
    public function PerfilAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(PerfilType::class,$user);
        
        $form->handleRequest($request);
        if(($form->isSubmitted())&&($form->isValid())) {
            $user = $form->getData();
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('Su perfil ha sido modificado correctamente');
            return new RedirectResponse($this->generateUrl('homepage'));
        }
        
        return array('form'=>$form->createView());
    }
    
    /**
     * SERVICIOS PROFESIONALES
     */
    
    /**
     * @Template("AppBundle:ABM:servicio-listado.html.twig")
     */
    public function serviciosAction(Request $request)
    {
        $servicios = $this->getDoctrine()->getRepository('AppBundle:Servicio')->findAll();
        return array('servicios'=>$servicios);
    }
    
    /**
     * @Template("AppBundle:ABM:servicio-form.html.twig")
     */
    public function servicioFormAction(Request $request) {
        $id = $request->query->get('id');
        if(empty($id)){
            $servicio = new Servicio();
        } else {
            $servicio = $this->getDoctrine()->getRepository('AppBundle:Servicio')->find($id);
            if(!$servicio) {
                $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
                return new RedirectResponse($this->generateUrl('homepage'));
            }
        }
        $form = $this->createForm(ServicioType::class,$servicio);
        
        $form->handleRequest($request);
        if(($form->isSubmitted())&&($form->isValid())) {
            $servicio = $form->getData();
            $this->getDoctrine()->getManager()->persist($servicio);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('El servicio ha sido guardado correctamente');
            return new RedirectResponse($this->generateUrl('panel_servicios'));
        }
        
        return array('form'=>$form->createView());
    }
    
    public function servicioDeleteAction(Request $request,$id) {
        if(empty($id)){
            $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
            return new RedirectResponse($this->generateUrl('homepage'));
        } else {
            $servicio = $this->getDoctrine()->getRepository('AppBundle:Servicio')->find($id);
            if(!$servicio) {
                $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
                return new RedirectResponse($this->generateUrl('homepage'));
            }
            $this->getDoctrine()->getManager()->remove($servicio);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('El servicio ha sido eliminado correctamente');
            return new RedirectResponse($this->generateUrl('panel_servicios'));
        }
    }
    
    /****
     * OBRA SOCIAL
     */
    
    /**
     * @Template("AppBundle:ABM:obras-sociales-listado.html.twig")
     */
    public function obrasSocialesAction(Request $request)
    {
        $obras = $this->getDoctrine()->getRepository('AppBundle:ObraSocial')->findAll();
        return array('obras'=>$obras);
    }
    
    /**
     * @Template("AppBundle:ABM:obra-social-form.html.twig")
     */
    public function obraSocialFormAction(Request $request) {
        $id = $request->query->get('id');
        if(empty($id)){
            $obra = new ObraSocial();
        } else {
            $obra = $this->getDoctrine()->getRepository('AppBundle:ObraSocial')->find($id);
            if(!$obra) {
                $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
                return new RedirectResponse($this->generateUrl('homepage'));
            }
        }
        $form = $this->createForm(ObraSocialType::class,$obra);
        
        $form->handleRequest($request);
        if(($form->isSubmitted())&&($form->isValid())) {
            $obra = $form->getData();
            $this->getDoctrine()->getManager()->persist($obra);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('La obra social ha sido guardada correctamente');
            return new RedirectResponse($this->generateUrl('panel_obras_sociales'));
        }
        
        return array('form'=>$form->createView());
    }
    
    public function obraSocialDeleteAction(Request $request,$id) {
        if(empty($id)){
            $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
            return new RedirectResponse($this->generateUrl('homepage'));
        } else {
            $obra = $this->getDoctrine()->getRepository('AppBundle:ObraSocial')->find($id);
            if(!$obra) {
                $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
                return new RedirectResponse($this->generateUrl('homepage'));
            }
            $this->getDoctrine()->getManager()->remove($obra);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('La obra social ha sido eliminada correctamente');
            return new RedirectResponse($this->generateUrl('panel_obras_sociales'));
        }
    }
    
    /****
     * GALERIA
     */
    
    /**
     * @Template("AppBundle:ABM:galerias-listado.html.twig")
     */
    public function galeriasAction(Request $request)
    {
        $galerias = $this->getDoctrine()->getRepository('AppBundle:Galeria')->findAll();
        return array('galerias'=>$galerias);
    }
    
    /**
     * @Template("AppBundle:ABM:galeria-form.html.twig")
     */
    public function galeriaFormAction(Request $request) {
        $id = $request->query->get('id');
        if(empty($id)){
            $galeria = new Galeria();
        } else {
            $galeria = $this->getDoctrine()->getRepository('AppBundle:Galeria')->find($id);
            if(!$galeria) {
                $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
                return new RedirectResponse($this->generateUrl('homepage'));
            }
        }
        $form = $this->createForm(GaleriaType::class,$galeria);
        
        $form->handleRequest($request);
        if(($form->isSubmitted())&&($form->isValid())) {
            $galeria = $form->getData();
            $this->getDoctrine()->getManager()->persist($galeria);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('La galeria ha sido guardada correctamente');
            return new RedirectResponse($this->generateUrl('panel_galerias'));
        }
        
        return array('form'=>$form->createView());
    }
    
    public function galeriaDeleteAction(Request $request,$id) {
        if(empty($id)){
            $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
            return new RedirectResponse($this->generateUrl('homepage'));
        } else {
            $galeria = $this->getDoctrine()->getRepository('AppBundle:Galeria')->find($id);
            if(!$galeria) {
                $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
                return new RedirectResponse($this->generateUrl('homepage'));
            }
            $this->getDoctrine()->getManager()->remove($galeria);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash('La galeria ha sido eliminada correctamente');
            return new RedirectResponse($this->generateUrl('panel_galerias'));
        }
    }
}


