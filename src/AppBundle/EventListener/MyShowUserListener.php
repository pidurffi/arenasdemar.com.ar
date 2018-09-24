<?php
namespace AppBundle\EventListener;


use Avanzu\AdminThemeBundle\Event\ShowUserEvent;
use Avanzu\AdminThemeBundle\Model\NavBarUserLink;
use MdlpBundle\Entity\User;
//use MyAdminBundle\Model\UserModel;

class MyShowUserListener {
    
    // ...
    private $sec;
    public function __construct($secSt){
        $this->sec = $secSt;
    }
    
    public function onShowUser(ShowUserEvent $event) {
        
        $user = $this->getUser();
        $event->setUser($user);
        
        $event->setShowProfileLink(true);
        
        //$event->addLink(new NavBarUserLink('Followers', 'logout'));
        //$event->addLink(new NavBarUserLink('Sales', 'logout'));
        //$event->addLink(new NavBarUserLink('Friends', 'logout', ['id' => 2]));
        
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
    
}