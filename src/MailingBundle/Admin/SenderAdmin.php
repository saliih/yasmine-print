<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 01/05/16
 * Time: 13:47
 */

namespace MailingBundle\Admin;


use MailingBundle\Admin\BaseAdmin as Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AdminInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;

class SenderAdmin extends Admin
{

    public function getname()
    {
        return 'Mailing sender';
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', null, array('label' => 'Nom de la compagne'))
            ->add('send')
            ->add('dcr', null, array('label' => 'date de création'))
            ->add('finshed', null, array('label' => 'date de fin d\'envoi'))
            ->add('total', null, array('label' => 'Total Envoyer'))
            ->add('opened', null, array('label' => 'Open'))
            ->add('sended', null, array('label' => 'Send'))
            ->add('_action', 'actions', array(
                'actions' => array(
                     'appercu' => array("template"=>'MailingBundle:Button:appercu.html.twig'),
                     'sendtest' => array("template"=>'MailingBundle:Button:sendtest.html.twig'),
                     'send' => array("template"=>'MailingBundle:Button:send.html.twig'),
                    //'edit' => array(),

                    //'delete' => array()
                )
            ));
    }
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('appercu', $this->getRouterIdParameter() . '/appercu');
        $collection->add('sendtest', $this->getRouterIdParameter() . '/sendtest');
        $collection->add('send', $this->getRouterIdParameter() . '/send');
        $collection->add('ajaxsend', $this->getRouterIdParameter() . '/ajaxsend');
    }
}