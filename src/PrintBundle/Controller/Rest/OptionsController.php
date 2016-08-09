<?php

namespace PrintBundle\Controller\Rest;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\BrowserKit\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use PrintBundle\Entity\Options;
class OptionsController extends Controller
{
    /**
     * GET Route annotation.
     * @Get("/{id}/options")
     */
    public function getOptionsAction($id)
    {
        $template=$this->getDoctrine()->getRepository("PrintBundle:Template")->find($id);
        $options = $this->getDoctrine()->getRepository("PrintBundle:Options")->findBy(array("template"=>$template));
        return $options;
    }
    public function getOptionAction($id)
    {
        $option = $this->getDoctrine()->getRepository("PrintBundle:Options")->find($id);
        return $option;
    }
    public function putOptionsAction($id=null)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $data = json_decode($request->getContent(), true);
        if ($id==0){
            $option = new Options();
        }else{
            $option=$this->getDoctrine()->getRepository("PrintBundle:Options")->find($id);
        }
        $option->setAlign($data['align']);
        $option->setBold($data['bold']);
        $option->setColor($data['color']);
        $option->setFont($data['font']);
        $option->setFontsize($data['fontsize']);
        $option->setHeight($data['height']);
        $option->setName($data['name']);
        $option->setType($data['type']);
        $option->setWidth($data['width']);
        $option->setY($data['y']);
        $option->setX($data['x']);
        $template=$this->getDoctrine()->getRepository("PrintBundle:Template")->find($data['templateid']);
        $option->setTemplate($template);

        $em->persist($option);
        $em->flush();

        return $option;
    }

    public function deleteOptionAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $activity=$this->getDoctrine()->getRepository("PrintBundle:Options")->find($id);

        $em->remove($activity);
        $em->flush();
    }
}
