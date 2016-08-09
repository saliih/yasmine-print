<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 25/03/16
 * Time: 15:53
 */

namespace PrintBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;//RouteCollection
use Sonata\AdminBundle\Route\RouteCollection;

class TemplateAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('template', $this->getRouterIdParameter().'/template');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text',array("label"=>"Template"));
        $formMapper->add('file', 'file',array("label"=>"fichier AI",'required' => false,'data_class'=>null));
        $formMapper->add('width', 'number',array("label"=>"largeur"));
        $formMapper->add('height', 'number',array("label"=>"hauteur"));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("file", null, array(
                'template' => 'PrintBundle:Template:picture.html.twig'
            ))
            ->addIdentifier('name')
        ->add('dcr')
            ->add('_action', 'actions', array(
                'actions' => array(
                   // 'show' => array(),
                    'edit' => array(),
                    'template' => array(
                        'template' => 'PrintBundle:Template:list__action_template.html.twig'
                    ),
                    'delete' => array(),

                )))
        ;
    }
    public function prePersist($obj) {
        $this->saveFile($obj);
    }

    public function preUpdate($obj) {
        $this->saveFile($obj);
        $obj->setUpdated(new \DateTime());
    }

    public function saveFile($obj) {

        $path = $this->getConfigurationPool()->getContainer()->get('kernel')->getRootDir()."/../web/";
        $obj->upload($path);
        if($obj->getFile()) {
            $file = $path . "uploads/ai/" . $obj->getFile();
            $tab = explode(".", $obj->getFile());
            $filename = $tab[0];
            $pdffile = $path . "uploads/pdf/" . $filename . ".pdf";
            $pngfile = $path . "uploads/png/" . $filename . ".png";

            exec("convert -density 300 $file  $pdffile");
            exec("convert -density 300 $file  $pngfile");
            $obj->setJpgfile($filename . ".png");
            $obj->setPdffile($filename . ".pdf");
        }

    }

}