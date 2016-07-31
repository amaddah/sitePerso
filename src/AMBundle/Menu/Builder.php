<?php
/**
 * Created by PhpStorm.
 * User: amaddah
 * Date: 29/07/16
 * Time: 21:03
 */

namespace AMBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function menuNavigation(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'index'));

        /*$menu->addChild('Test', array(
            'route' => 'blog_show',
            'routeParameters' => array()
        ));*/

        // create another menu item
        $menu1 = $menu->addChild('Mes expériences', array('route' => 'experience_index'));
        $menu2 = $menu->addChild('Formation', array('route' => 'formation_index'));
        $menu3 = $menu->addChild('Mon CV', array('route' => 'cv_index'));
        $menu4 = $menu->addChild('Mes passions', array('route' => 'homepage'));

        // ... add more children

        return $menu;
    }
}