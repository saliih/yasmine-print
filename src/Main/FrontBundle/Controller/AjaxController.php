<?php

namespace Main\FrontBundle\Controller;

use Main\FrontBundle\Entity\command;
use Main\FrontBundle\Entity\paramtpl;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function generatepdfAction(command $commande)
    {
        $request = $this->get('request');
        $tools = $this->get('tools.utils');
        $session = $request->getSession();
        if ($session->has('tpl')) {
            $tpl = $commande->getToprint();
            $pdffile = "";
            foreach ($tpl as $key => $elemnt) {
                foreach($elemnt as $val) {
                    $prod = $this->getDoctrine()->getRepository('MainFrontBundle:paramtpl')->find($val['id']);
                    $template = $prod->getTpl();
                    $tplpdf = str_replace("../","",$template->getPdf());
                    $pdffile = $this->get('kernel')->getRootDir() . '/../web/' .$tplpdf;
                }
            }
            $custom_layout = array(85, 55);
            $orientation = 'L';
            $pdf = new \FPDI($orientation, 'mm', $custom_layout, true, 'UTF-8', false);

            $pdf->setPageOrientation($orientation);

            $pdf->SetMargins(0, 0, 0);
            $pdf->SetAutoPageBreak(true, 0);
            $pdf->setFontSubsetting(false);
            $pdf->AddPage($orientation);
            //   echo "<pre>";print_r($pdf->getMargins());exit;
            $pdf->setSourceFile($pdffile);
            $_tplIdx = $pdf->importPage(1);
            $size = $pdf->useTemplate($_tplIdx, 0, 0, 85, 55, true);
            $idd = "";
            $i = 0;
            $oldx = 0;
            $oldy = 0;
            foreach ($elemnt as $value) {
                //if($i==0)
                if ($idd != $value['id'] && $value['value'] != "") {
                    $pdf->SetPageMark();
                    if (substr($value['value'], 0, 4) != "/tmp") {
                        //$tools->dump($value);
                        $align = strtoupper(substr($value['align'], 0, 1));
                        $color = $this->hex2rgb($value['color']);
                        $pdf->SetTextColor($color[0], $color[1], $color[2]);
                        $param = $this->getDoctrine()->getRepository('MainFrontBundle:paramtpl')->find($value['id']);
                        $y2 = ($param->getX1() / 5) ;
                         $x1 = ($param->getY1() / 5) ;
                        //$x1 = 10;$y2 = 8;

                        $w = ($param->getX2() / 5);
                        $h = ($param->getY2() / 5);
                        $oldx = $x1;
                        $oldy = $y2;

                        $pdf->SetX($x1, false);
                        $pdf->SetY($y2, false);
//$pdf->SetXY($x1, $y2,true);
                        $pdf->SetFont(null, '', $param->getSize() * 0.6);//$param->getPolice()
                        // echo $opt->getFontsize()."\n";
                        $pdf->Cell($w, $h, $value["value"],0,0,$align);
                    } else {
                        $param = $this->getDoctrine()->getRepository('MainFrontBundle:paramtpl')->find($value['id']);
                        $img = $this->getParameter('base_url') . $value['value'];
                        $pdf->Image($img, ($param->getX1() /4.5),
                            ($param->getY1() /4.55),
                            ($param->getX2() /4.55),
                            ($param->getY2() /4.5), '', '', '', true
                        );

                    }
                }

                $idd = $value['id'];
                $i++;
            }
            //$pdf->Cell(0, $size['h'], 'TCPDF and FPDI');
            // echo $template->getId();
            $pdf->Output($this->get('kernel')->getRootDir() . '/../web/pdf.pdf');

        }
        return new Response("");
    }

    public function puttemplateAction()
    {
        $request = $this->get('request');
        //echo "<pre>";print_r($request->request);exit;
        $session = $request->getSession();
        $prodid = $request->request->get('prodid');
        $data = $request->request->get('tpl');
        if (!$session->has('tpl')) {
            $session->set('tpl', array());
        }
        $tpl = $session->get('tpl');
        $tpl[$prodid] = $data;
        $session->set('tpl', $tpl);
        return new Response(0);
    }

    public function drawAccrodionAction($id)
    {
        $template = $this->getDoctrine()->getRepository('MainFrontBundle:tplprod')->find($id);

        return $this->render('MainFrontBundle:Ajax:template.html.twig', array('template' => $template));
    }

    public function listTemplateAction($id)
    {
        $template = $this->getDoctrine()->getRepository('MainFrontBundle:tplprod')->find($id);
        $tab = array();
        foreach ($template->getParameters() as $value) {
            $tab[] = array(
                "id" => $value->getId(),
                "name" => $value->getName(),
                "x1" => $value->getX1(),
                "x2" => $value->getX2(),
                "y1" => $value->getY1(),
                "y2" => $value->getY2(),
                "size" => $value->getSize(),
                "police" => $value->getPolice(),
                "type" => $value->getType(),
                "align" => $value->getAlign(),
                "color" => $value->getColor(),
            );
        }

        return new JsonResponse($tab);
    }

    public function uploadfilesAction()
    {
        $request = $this->get('request');
        $file = $request->files->get('myfile');
        $time = time();
        $folder = $this->get('kernel')->getRootDir() . '/../web/tmp/';

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the target filename to move to
        $file->move($folder, $time . $file->getClientOriginalName());

        // set the path property to the filename where you'ved saved the file
        return new Response("/tmp/" . $time . $file->getClientOriginalName());
        exit;
    }

    private function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }
}
