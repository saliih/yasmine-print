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

class ProductsAdmin extends Admin
{
    public function getname()
    {
        return 'Produits';
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('category');
        $formMapper->add('name', 'text', array("label" => "Nom de produit"));
        $formMapper->add('act', null, array("label" => "Active?",'required'=>false));
        $formMapper->add('costumise', null, array("label" => "Personisable?",'required'=>false));
        $formMapper->add('picture', 'file', array("label" => "Image", 'required'=>false,"data_class"=>null));
        $formMapper->add('descript');

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("picture",null,array('template'=>'MainFrontBundle:Fields:picture.html.twig'))
            ->addIdentifier("name")
            ->add("category")
            ->add("act",null,array( ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),

                )));
    }
    public function prePersist($object)
    {
        $object->upload();
    }
    public function preUpdate($object)
    {
        $object->upload();
    }
}