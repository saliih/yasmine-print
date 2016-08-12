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

class PlisAdmin extends Admin
{
    public function getname()
    {
        return 'Type des plis';
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('image', 'file', array("label" => "Fichier", 'required'=>false,"data_class"=>null));
        $formMapper->add('name', 'text', array("label" => "Nom de Fichier"));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("image")
            ->addIdentifier("name")
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