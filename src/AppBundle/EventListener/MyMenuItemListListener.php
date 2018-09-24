<?php
namespace AppBundle\EventListener;

use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\Request;
use Avanzu\AdminThemeBundle\Model\MenuItemModel;
use MdlpBundle\Entity\User;

class MyMenuItemListListener {
    
    // ...
	private $sec;
	public function __construct($secSt) {
		$this->sec = $secSt;
	}
    
	protected function getUser() {
		if (null === $token = $this->sec->getToken()) {
			return;
		}
		
		if (!is_object($user = $token->getUser())) {
			// e.g. anonymous authentication
			return;
		}
		
		return $user;
		// retrieve your concrete user model or entity
	}
	
    public function onSetupMenu(SidebarMenuEvent $event) {
        
        $request = $event->getRequest();
        
        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }
        
    }
    
    protected function getMenu(Request $request) {
    	$user = $this->getUser();
        $menuItems = array();
        $menuItems[] = new MenuItemModel('panel_servicios', "Servicios Profesionales", "panel_servicios");
        $menuItems[] = new MenuItemModel('panel_obras_sociales', "Obras Sociales", "panel_obras_sociales");
        $menuItems[] = new MenuItemModel('panel_galerias', "Galerías", "panel_galerias");
        /*$menuItems[] = new MenuItemModel('mi-establecimiento','Mi Establecimiento','mi_establecimiento');
        $menuItems[] = new MenuItemModel('promociones','Mis Promociones','panel_promociones');
	    $menuItems[] = new MenuItemModel('galerias','Mis Galerías','panel_galerias');
	    $menuItems[] = new MenuItemModel('avisos','Mis Avisos','panel_avisos');
        if($user->getId() == 1)  {
	        $menuItems[] = new MenuItemModel('banners-derecha','Banner Derecha','panel_banners_derecha');
	        $menuItems[] = new MenuItemModel('banners-institucionales','Banners Institucionales','panel_banners_institucionales');
        }*/
        return $this->activateByRoute($request->get('_route'), $menuItems);
        
        // Build your menu here by constructing a MenuItemModel array
        $menuItems = array(
            $blog = new MenuItemModel('ItemId', 'ItemDisplayName', 'item_symfony_route', array(/* options */), 'iconclasses fa fa-plane')
        );
        
        // Add some children
        
        // A child with an icon
        $blog->addChild(new MenuItemModel('ChildOneItemId', 'ChildOneDisplayName', 'child_1_route', array(), 'fa fa-rss-square'));
        
        // A child with default circle icon
        $blog->addChild(new MenuItemModel('ChildTwoItemId', 'ChildTwoDisplayName', 'child_2_route'));
        return $this->activateByRoute($request->get('_route'), $menuItems);
    }
    
    protected function activateByRoute($route, $items) {
        
        foreach($items as $item) {
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }
        
        return $items;
    }
    
}