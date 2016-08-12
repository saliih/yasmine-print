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

class CategoriesAdmin extends Admin
{
    public function getname()
    {
        return 'Produits';
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with(' ',array('class'=>'col-md-8'));
        $formMapper->add('name', 'text', array("label" => "Nom de la catégorie"));
        $formMapper->add('color', 'text', array("label" => "Couleur de la catégorie"));//sonata_type_color_selector
        $formMapper->add('costumise', null, array("label" => "Personisable?",'required'=>false));
        $formMapper->add('picture', 'file', array("label" => "Image", 'required'=>false,"data_class"=>null));
        $formMapper->add('descript');
        $formMapper->end();
        $formMapper->with('&nbsp;&nbsp;',array('class'=>'col-md-4'));
        $formMapper->add('plis',null,array('required' => false, 'expanded' => true, 'mapped' => true, "multiple" => true,));
        $formMapper->end();
        $formMapper->with('Options')
            ->add('options', 'sonata_type_collection', array(
                'by_reference' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ))->end();

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("picture",null,array('template'=>'MainFrontBundle:Fields:picture.html.twig'))
            ->add("color",null,array('template'=>'MainFrontBundle:Fields:color.html.twig'))
            ->add("act",null,array( 'editable' => true))
            ->add("name")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),

                )));
    }
    public function prePersist($object)
    {
        $this->updateFreign($object);
        $object->upload();
    }
    private function updateFreign($object){
        foreach($object->getOptions() as $opt){
            $opt->setCategory($object);
        }
    }
    public function preUpdate($object)
    {
        $this->updateFreign($object);
        $object->upload();
    }

}