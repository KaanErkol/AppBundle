<?php

namespace Kaan\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function basicNavbar(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $item = $menu->addChild('Home', array('route' => 'app_homepage','attributes' => array('icon' => 'icon-home')));
        $item = $menu->addChild('Shop', array('route' => 'product_homepage','attributes' => array('icon' => 'icon-shopping-cart')));
        $item = $menu->addChild('Link 2', array('uri' => '#'));

        return $menu;
    }

    public function rightMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        if($this->container->get('security.context')->isGranted('ROLE_USER'))
        {
            $user = $this->container->get('security.context')->getToken()->getUser();
            $dropdown = $menu->addChild($user->getUsername());
            $dropdown->addChild('Profile',array(
                'route' => 'user_homepage',
                'attributes' => array('icon' => 'icon-user')
            ));
            $dropdown->addChild(null,array('attributes'=>array('divider'=>TRUE)));
            $dropdown->addChild('Logout',array(
                'route' => '_security_logout',
                'attributes' => array('icon' => 'icon-off')
            ));
        } else {
            $menu->addChild('Login',array('route'=>'_security_login'));
            $menu->addChild('Register',array('route'=>'_security_register'));
        }
        return $menu;
    }
}