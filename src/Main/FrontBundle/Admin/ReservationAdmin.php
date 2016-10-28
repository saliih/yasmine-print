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

class ReservationAdmin extends Admin
{
    protected $datagridValues = array(

        '_sort_order' => 'DESC',
        '_page' => 1,
        '_per_page' => 25,

    );
    public function getname()
    {
        return 'Demande de devis';
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('ref');
    }
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('ref')
            ->add('dcr')
            ->add('detail')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        // to remove a single route
        $collection->remove('create');
       // $collection->remove('delete');
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("ref",null,array('label'=>'Reference'))
            ->add("dcr")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'delete' => array(),
                    'pdf' => array('template'=>"MainFrontBundle:Bt:pdf.html.twig"),

                )));
    }

}