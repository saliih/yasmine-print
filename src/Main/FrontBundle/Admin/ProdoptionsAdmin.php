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

class ProdoptionsAdmin extends Admin
{
    public function getname()
    {
        return 'options';
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text', array("label" => "Nom de l'options"));
        $formMapper->add('active', null, array("label" => "Par defaut",'required'=>false));
        $formMapper->add('price', null, array("label" => "Prix"));

    }

}