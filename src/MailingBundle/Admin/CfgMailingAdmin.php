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

class CfgMailingAdmin extends Admin
{
    public function getname()
    {
        return 'Mailing Configuration';
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Configuration'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    // 'view' => array(),
                    'edit' => array()

                )
            ));

    }
    protected function configureRoutes(RouteCollection $collection)
    {
        // to remove a single route
        $collection->remove('create');
        $collection->remove('delete');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('waits')
            ->add('numberbywait')
            ->add('sender')
            ->add('replayemail')
            // you can define help messages like this
            ;

    }
}