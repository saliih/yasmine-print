<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 12/04/16
 * Time: 20:07
 */

namespace PrintBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PdflistAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('file', 'text', array("label" => "Fichier pdf"));
        $formMapper->add('repeat', 'text', array("label" => "Nombre"));

    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $parent = $this->getRoot()->getSubject();
        $instance->setPdfmerge($parent);

        return $instance;
    }

}