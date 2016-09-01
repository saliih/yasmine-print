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

class ProdimgAdmin extends Admin
{
    protected $parentAssociationMapping = 'category';

    public function getname()
    {
        return 'images des produits';
    }

    public function getNewInstance()
    {
        return parent::getNewInstance(); // TODO: Change the autogenerated stub
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('img', 'text', array("label" => "Fichier", 'required' => false));
        $formMapper->add('ord', 'text', array("label" => "ordre"));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("img", null, array('template' => 'MainFrontBundle:Fields:img.html.twig'))
            ->add("ord")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),

                )));
    }

}