<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 12/04/16
 * Time: 20:06
 */

namespace PrintBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PdfmergeAdmin extends Admin
{
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
    );

    public function getname()
    {
        return 'Pdf to merge';
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('generatepdf', $this->getRouterIdParameter() . '/generatepdf');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Général', array('class' => "col-md-6"));
        $formMapper->add('name', 'text', array("label" => "Nom de papier"));
        $formMapper->add('marge', 'text', array("label" => "Marge entre les element"));
        $formMapper->add('nbpage', 'choice', array("label" => "Nomber des page",
            'choices' => array(
                '1' => '1',
                '2' => '2'
            ),
        ));

        $formMapper->end();
        $formMapper->with("Elements", array('class' => "col-md-6"));
        $formMapper->add('width', 'text', array("label" => "Largeur"));
        $formMapper->add('height', 'text', array("label" => "Hauteur"));
        $formMapper->end();
        $formMapper->with('PDF', array('class' => "col-md-12"));
        $formMapper->add('pdflist', 'sonata_type_collection', array(
            'by_reference' => false
        ), array(
            'edit' => 'inline',
            'inline' => 'table',
            'sortable' => 'position',
        ));
        $formMapper->end();
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
                    // 'show' => array(),
                    'edit' => array(),
                    'generatepdf' => array(
                        'template' => 'PrintBundle:Pdflist:list__action_template.html.twig'
                    ),
                    'delete' => array(),

                )));
    }

    public function prePersist($object)
    {
        foreach ($object->getPdflist() as $pdf) {
            $pdf->setPdfmerge($object);
        }
    }

    public function preUpdate($object)
    {
        foreach ($object->getPdflist() as $pdf) {
            $pdf->setPdfmerge($object);
        }
    }


}