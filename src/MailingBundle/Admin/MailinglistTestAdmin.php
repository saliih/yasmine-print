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

class MailinglistTestAdmin extends Admin
{
    public function getname()
    {
        return 'Mailing list Test';
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email', null, array('label' => 'Email'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    // 'view' => array(),
                    'edit' => array(),
                    'delete' => array()
                )
            ));
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("email")
            // you can define help messages like this
            ->setHelps(array(
                'title' => "mailing list Test"
            ));
    }
}