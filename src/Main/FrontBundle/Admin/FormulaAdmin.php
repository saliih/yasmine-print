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
use Sonata\AdminBundle\Show\ShowMapper;

class FormulaAdmin extends Admin
{
    protected $datagridValues = array(

        '_sort_order' => 'DESC',
        '_page' => 1,
        '_per_page' => 25,

    );
    protected function configureRoutes(RouteCollection $collection)
    {
        // to remove a single route
        $collection->remove('create');
        $collection->remove('delete');
    }
    public function getname()
    {
        return 'Demande de devis';
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('civ')
            ->add('name')
            ->add('pname')
            ->add('adress')
            ->add('cp')
            ->add('ville')
            ->add('Pays')
            ->add('datenaisse')
            ->add('profession')
            ->add('tel')
            ->add('email')
            ->add('sweb')
            ->add('besoin')
            ->add('msg')
            ->add('newsletter')
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("name")
            ->add("besoin")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'delete' => array(),

                )));
    }

}