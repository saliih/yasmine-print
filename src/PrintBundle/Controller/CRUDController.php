<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 26/03/16
 * Time: 12:41
 */

namespace PrintBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class CRUDController extends Controller
{

    public function templateAction()
    {
        $template = $this->admin->getSubject();
        return $this->render('PrintBundle:Template:template.html.twig', array('template' => $template));
    }

    public function generatepdfAction($id)
    {
        $width = 320;
        $height = 450;
        $pdfmerge = $this->getDoctrine()->getRepository('PrintBundle:Pdfmerge')->find($id);
        $elementwidth = $pdfmerge->getWidth();
        $elementheight = $pdfmerge->getHeight();
        $marge = $pdfmerge->getMarge();
        $singlewidth = $elementwidth + $marge;
        $singleheight = $elementheight + $marge;

        // test occupation
        $test1 = (int)($height / $singleheight) * (int)($width / $singlewidth);
        $test2 = (int)($width / $singleheight) * (int)($height / $singlewidth);
        if ($test1 >= $test2) {
            $width = 320;
            $height = 450;
            $orientation = "P";
        } else {
            $width = 450;
            $height = 320;
            $orientation = "L";
        }
        // calculate margin
        $nbrX = (int)($width / $singlewidth);
        $nbrY = (int)($height / $singleheight);
        $marginleft = ($width - ($nbrX * $singlewidth)) / 2;
        $margintop = ($height - ($nbrY * $singleheight)) / 2;
        //print_r(array($orientation, $marginleft, $margintop));

        $custom_layout = array($width, $height);
        $pdf = new \FPDI($orientation, 'mm', 'SRA3', true, 'UTF-8', false);
        $pdf->setPageOrientation($orientation);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins($marginleft, 40, $marginleft);
        $pdf->SetAutoPageBreak(true, 40);
        $pdf->setFontSubsetting(false);

// add a page

        $pdf->AddPage($orientation);

        $i = 0;
        $path = $this->get('kernel')->getRootDir() . '/../web/';
        $toaddheight = $margintop;

        $face = array();$j = 0;
        foreach ($pdfmerge->getPdflist() as $list) {
            for($k=0;$k<$list->getRepeat();$k++) {
                if ($i == $nbrX) {
                    $i = 0;
                    $j++;
                    $toaddheight += $singleheight;
                }
                $toaddwidth = $i * $singlewidth + $marginleft;
                $face[$toaddheight][$toaddwidth] = $list->getFile();
                $i++;
            }
        }
        $reverse = array();
        foreach($face as $y=>$value){
            foreach($value as $x=>$fichier){

                $file = $path . $fichier;
                $pdf->setSourceFile($file);
                $_tplIdx = $pdf->importPage(1);
                $size = $pdf->useTemplate($_tplIdx, $x, $y, 85);
                $reverse[$y][$x] = $fichier;
            }
        }//echo "<pre>";print_r($face);exit;

        $this->repert($pdf,$face,$marginleft,$margintop,$singlewidth,$singleheight,$height,$width);

        if($pdfmerge->getNbpage() == 2) {
            $pdf->AddPage($orientation);
            foreach ($reverse as $y => $value) {
                foreach ($value as $x => $fichier) {

                    $file = $path . $fichier;
                    $pdf->setSourceFile($file);
                    $_tplIdx = $pdf->importPage(2);
                    $size = $pdf->useTemplate($_tplIdx, $x, $y, 85);
                    $reverse[$y][$x] = $fichier;
                }
            }
            $this->repert($pdf,$face,$marginleft,$margintop,$singlewidth,$singleheight,$height,$width);
        }

        $pdf->Output("aaa.pdf", 'I');



    }
    public function repert($pdf,$face,$marginleft,$margintop,$singlewidth,$singleheight,$width,$height){
        $style2 = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $style3 = array('width' => 0.1, 'cap' => 'round', 'join' => 'round', 'dash' => 0, 'color' => array(0, 0, 0));
        $pdf->Line(($marginleft/2), $margintop, ($marginleft-2), $margintop, $style3);
        $kx = 0;
        $top = $margintop;
        foreach($face as $x=>$value){
            if($kx ==0) {
                $k = $marginleft;
                $i = 0;
                foreach ($value as $y => $v) {
                    if ($i != 0)
                        $k += $singlewidth;
                    $pdf->Line($k, ($margintop / 2), $k, ($margintop - 2), $style2);
                    $pdf->Line($k, ($width-($margintop)), $k, ($width-($margintop))+10, $style2);
                    $i++;
                }
                $k += $singlewidth;
                $pdf->Line($k, ($margintop / 2), $k, ($margintop - 2), $style2);
                $pdf->Line($k, ($width-($margintop)), $k, ($width-($margintop))+10, $style2);
            }
            if($kx !=0)
                $top += $singleheight;

            $pdf->Line(($marginleft/2), $top, ($marginleft-2), $top, $style3);
            $pdf->Line($height-($marginleft/2), $top, $height-($marginleft), $top, $style3);
            $kx++;
        }
        $top += $singleheight;

        $pdf->Line(($marginleft/2), $top, ($marginleft-2), $top, $style3);
        $pdf->Line($height-($marginleft/2), $top, $height-($marginleft), $top, $style3);
    }
}