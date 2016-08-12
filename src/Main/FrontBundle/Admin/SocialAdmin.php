<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 09/08/16
 * Time: 09:37
 */

namespace Main\FrontBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SocialAdmin extends Admin
{
    public function getname()
    {
        return 'Social';
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('icon', 'text', array("label" => "Icon"));
        $formMapper->add('link', 'text', array("label" => "Lien"));
        $formMapper->add('ord', 'text', array("label" => "Ordre d'affichage"));

    }

    protected function configureRoutes(RouteCollection $collection)
    {
        // to remove a single route
         $collection->remove('create');
        $collection->remove('delete');
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("icon")
            ->add("ord")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),

                )));
    }
}