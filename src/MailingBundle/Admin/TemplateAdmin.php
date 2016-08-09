<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 01/05/16
 * Time: 10:30
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

class TemplateAdmin extends Admin
{
    public function getname()
    {
        return 'Mailing Model';
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Nom de la compagne'))
            ->add('dcr', null, array('label' => 'date de création'))
            ->add('send')
            ->add('finshed', null, array('label' => 'date de fin d\'envoi'))
            ->add('total', null, array('label' => 'Total Envoyer'))
            ->add('opened', null, array('label' => 'Open'))
            ->add('sended', null, array('label' => 'Send'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    // 'view' => array(),
                    'edit' => array(),
                    'appercu' => array("template"=>'MailingBundle:Button:appercu.html.twig'),
                    'sendtest' => array("template"=>'MailingBundle:Button:sendtest.html.twig'),
                    'send' => array("template"=>'MailingBundle:Button:send.html.twig'),
                    'delete' => array()
                )
            ));
    }
    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid
            ->add('title')
            ->add('dcr')
            ->add('send');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("title")
            ->add("template", null,array('required'=>false))
            // you can define help messages like this
            ->setHelps(array(
                'title' => "mailing list"
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