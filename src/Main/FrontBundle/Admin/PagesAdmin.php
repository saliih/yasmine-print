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

class PagesAdmin extends Admin
{
    public function getname()
    {
        return 'Pages de contenue';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text', array("label" => "Nom de la page"));
        $formMapper->add('body', 'textarea', array("label" => "Contenue"));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("name")
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),

                )));
    }

    public function prePersist($object)
    {
        $this->doAlias($object);
    }

    public function preUpdate($object)
    {
        $this->doAlias($object);
    }

    private function doAlias($object)
    {
        $service = $this->getConfigurationPool()->getContainer()->get('tools.utils');
        $object->setAlias($service->slugify($object->getName()));
    }
}