<?php

namespace Main\FrontBundle\Controller;

use Main\FrontBundle\Entity\paramtpl;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function generatepdfAction(){
        $request = $this->get('request');
        $tools = $this->get('tools.utils');
        $session = $request->getSession();
        if($session->has('tpl')){
            $tpl = $session->get('tpl');
           // $tools->dump($tpl);
            $pdffile = "";
            foreach($tpl as $key=>$elemnt){
                $prod = $this->getDoctrine()->getRepository('MainFrontBundle:tplprod')->find($key);
                $pdffile = $this->get('kernel')->getRootDir() . '/../web/'.$prod->getPdf();
            }
            $custom_layout = array(85,55);
            $orientation = 'L';
            $pdf = new \FPDI($orientation, 'mm', $custom_layout, true, 'UTF-8', false);

            $pdf->setPageOrientation($orientation);

            $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
            $pdf->SetAutoPageBreak(true, 40);
            $pdf->setFontSubsetting(false);
            $pdf->AddPage($orientation);
            $pdf->setSourceFile($pdffile);
            $_tplIdx = $pdf->importPage(1);
            $size = $pdf->useTemplate($_tplIdx, 0, 0, 85,55,true);

            foreach($elemnt as $value){
                //$tools->dump($value);
                $param = $this->getDoctrine()->getRepository('MainFrontBundle:paramtpl')->find($value['id']);
                $pdf->SetXY($param->getX1()/10, $param->getY1()/10);
                $pdf->SetFont(null, '', $param->getSize());//$param->getPolice()
                // echo $opt->getFontsize()."\n";
                $pdf->Cell((($param->getX2() - $param->getX1()/10)), (($param->getY2() - $param->getY1())/10), $value["value"]);
            }
            //$pdf->Cell(0, $size['h'], 'TCPDF and FPDI');
            // echo $template->getId();
            $pdf->Output($this->get('kernel')->getRootDir() . '/../web/pdf.pdf');

        }
        return new Response("");
    }
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
    public function drawAccrodionAction($id){
        $template = $this->getDoctrine()->getRepository('MainFrontBundle:tplprod')->find($id);

        return $this->render('MainFrontBundle:Ajax:template.html.twig',array('template'=>$template));
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
