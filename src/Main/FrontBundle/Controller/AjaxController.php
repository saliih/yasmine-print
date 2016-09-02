<?php

namespace Main\FrontBundle\Controller;

use Main\FrontBundle\Entity\paramtpl;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function puttemplateAction(){
        $request = $this->get('request');
        $session = $request->getSession();
        $prodid  =$request->request->get('prodid');
        $data = $request->request->get('tpl');
        if(!$session->has('tpl')){
            $session->set('tpl',array());
        }
        $tpl = $session->get('tpl');
        $tpl[$prodid] = $data;
        $session->set('tpl',$tpl);
        return new Response(0);
    }
    public function listTemplateAction($id)
    {
        $template = $this->getDoctrine()->getRepository('MainFrontBundle:tplprod')->find($id);
        $tab = array();
        foreach($template->getParameters() as $value){
            $tab[] = array(
                "id"=>$value->getId(),
                "name"=>$value->getName(),
                "x1"=>$value->getX1(),
                "x2"=>$value->getX2(),
                "y1"=>$value->getY1(),
                "y2"=>$value->getY2(),
                "size"=>$value->getSize(),
                "police"=>$value->getPolice(),
                "type"=>$value->getType(),
                "align"=>$value->getAlign(),
                "color"=>$value->getColor(),
            );
        }

        return new JsonResponse($tab);
    }
}
