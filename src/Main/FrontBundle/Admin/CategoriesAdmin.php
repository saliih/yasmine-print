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
        return 'Catégories';
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text', array("label" => "Nom de la catégorie"));
        $formMapper->add('color', 'sonata_type_color_selector', array("label" => "Couleur de la catégorie"));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("color",null,array('template'=>'MainFrontBundle:Category:color.html.twig'))
            ->add("act",null,array( 'editable' => true))
            ->addIdentifier("name")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),

                )));
    }

}