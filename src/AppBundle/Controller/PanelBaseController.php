<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MdlpBundle\Entity\User;
use MdlpBundle\Entity\Establecimiento;
use MdlpSitioBundle\Services\SitioResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PanelBaseController extends Controller  {
	
    protected function addErrorFlash($text) {
        $this->addFlash('error', $text);
    }
    protected function addSuccessFlash($text) {
        $this->addFlash('success', $text);
    }
    protected function addInfoFlash($text) {
        $this->addFlash('info', $text);
    }
    protected function addWarningFlash($text) {
        $this->addFlash('warning', $text);
    }

	protected function isSuperAdmin() {
		/**
		 * @var User $user
		 */
		$user = $this->getUser();
		return $user->hasRole(User::ROLE_SUPER_ADMIN);
	}
	
	protected function verificarSuperAdmin() {
		if(!$this->isSuperAdmin()) throw $this->createNotFoundException();
	}
	
	protected function verificarAdminEstablecimiento() {
	    $est = $this->getEstablecimientoUsuario();
	    if(!$est) die("Imposible acceder");
	}
	
	/**
	 * @return Establecimiento
	 */
	protected function getEstablecimientoUsuario() {
	    //if($this->isSuperAdmin()) die("Ustedes esta logueado como administrador");
	    /** @var User $user */
	    $user = $this->getUser();
	    if($this->isSuperAdmin()) {
	        if($this->getUser()->getEstablecimientoActivo()) return $this->getUser()->getEstablecimientoActivo();
	        else {
	            $this->getUser()->setEstablecimientoActivo( $this->getDoctrine()->getRepository('MdlpBundle:Establecimiento')->find(1));
	            $this->getDoctrine()->getManager()->persist($this->getUser());
	            $this->getDoctrine()->getManager()->flush();
	            return $this->getUser()->getEstablecimientoActivo();
	        }
	    } else {
	        if(($this->getUser()->getEstablecimientoActivo())&&($this->getUser()->esAdminDeEstablecimiento($this->getUser()->getEstablecimientoActivo()))) return $this->getUser()->getEstablecimientoActivo();
	        foreach($this->getUser()->getEstablecimientos() as $establecimiento) {
	            $this->getUser()->setEstablecimientoActivo($establecimiento);
	            $this->getDoctrine()->getManager()->persist($this->getUser());
	            $this->getDoctrine()->getManager()->flush();
	            return $this->getUser()->getEstablecimientoActivo();
	        }
	    }
	    die("Su usuario no está habilitado");
	    return $user->getEstablecimientos()->first();
	}
	
	/**
	 * @return SitioResolver
	 */
	protected function getSitioResolver() {
        	return $this->get('sitio_resolver');
	}
	
	public function entidadFormAction(Request $request,$class,$typeClass,$setearEstablecimiento,$nombreEntidad,$routing_listado) {
		$this->verificarAdminEstablecimiento();
		$id = $request->query->get('id');
		if(empty($id)){
			$entidad = new $class();
			if($setearEstablecimiento) $entidad->setEstablecimiento($this->getUser()->getEstablecimientoActivo());
		} else {
			$entidad = $this->getDoctrine()->getRepository($class)->find($id);
			//$promocion = $this->getDoctrine()->getRepository('MdlpBundle:Promocion')->find($id);
			if(!$entidad) {
			    die($id);
				$this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
				return new RedirectResponse($this->generateUrl('panel_homepage'));
			}
			if($setearEstablecimiento) {
				if($entidad->getEstablecimiento()->getId() != $this->getUser()->getEstablecimientoActivo()->getId()) {
					$this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
					return new RedirectResponse($this->generateUrl('panel_homepage'));
				}
			}
		}
		$form = $this->createForm($typeClass,$entidad,array('sitio_resolver'=>$this->getSitioResolver()));
		
		$form->handleRequest($request);
		if(($form->isSubmitted())&&($form->isValid())) {
			$entidad= $form->getData();
			$this->getDoctrine()->getManager()->persist($entidad);
			$this->getDoctrine()->getManager()->flush();
			$this->addSuccessFlash($nombreEntidad.' ha sido guardada correctamente');
			return new RedirectResponse($this->generateUrl($routing_listado));
		}
		
		return array('form'=>$form->createView());
	}
	
	public function entidadDeleteAction(Request $request,$id,$class,$chequear_establecimiento,$nombre_entidad,$route_listado) {
	    $this->verificarAdminEstablecimiento();
	    if(empty($id)){
	        $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
	        return new RedirectResponse($this->generateUrl('panel_homepage'));
	    } else {
	        $entidad = $this->getDoctrine()->getRepository($class)->find($id);
	        if(!$entidad) {
	            $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
	            return new RedirectResponse($this->generateUrl('panel_homepage'));
	        }
	        if($chequear_establecimiento) {
	            if($entidad->getEstablecimiento()->getId() != $this->getUser()->getEstablecimientoActivo()->getId()) {
        	            $this->addErrorFlash('Acceso incorrecto. Se ha enviado una notificación al administrador');
        	            return new RedirectResponse($this->generateUrl('panel_homepage'));
        	        }
	        }
	        $this->getDoctrine()->getManager()->remove($entidad);
	        $this->getDoctrine()->getManager()->flush();
	        $this->addSuccessFlash($nombre_entidad.' ha sido eliminada correctamente');
	        return new RedirectResponse($this->generateUrl($route_listado));
	    }
	}
	
}