<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 01/04/16
 * Time: 20:14
 */

namespace PrintBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PrintCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('print:pdf')
            ->setDescription('Print pdf')
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'Who do you want to greet?'
            )
            ->addArgument(
                'pdf',
                InputArgument::REQUIRED,
                'Who do you want to greet?'
            )
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $id = $input->getArgument('id');
        $pdffile = $input->getArgument('pdf');
        $em = $this->getContainer()->get('doctrine');
        $tab = $this->csv($pdffile);
        $template = $em->getRepository('PrintBundle:Template')->find($id);
        $path = $this->getContainer()->get('kernel')->getRootDir() . '/../web/uploads/pdf/' . $template->getPdffile();
        $width = $template->getWidth();
        $height = $template->getHeight();
        $orientation = ($height > $width) ? 'P' : 'L';
        $custom_layout = array($width, $height);
        $i = 1;
        foreach ($tab as $key => $value) {
            $pdf = new \FPDI($orientation, 'mm', $custom_layout, true, 'UTF-8', false);

            $pdf->setPageOrientation($orientation);

            $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
            $pdf->SetAutoPageBreak(true, 40);
            $pdf->setFontSubsetting(false);

// add a page
            $pdf->AddPage($orientation);
            $pdf->setSourceFile($path);
            $_tplIdx = $pdf->importPage(1);
            $size = $pdf->useTemplate($_tplIdx, 0, 0, $width,true);


            foreach ($template->getChildactivity() as $opt) {
                $pdf->SetXY($opt->getX(), $opt->getY());
                $pdf->SetFont($opt->getFont(), '', $opt->getFontsize() * 2);
                // echo $opt->getFontsize()."\n";
                $pdf->Cell($opt->getWidth(), $opt->getHeight(), $value[$opt->getName()]);
            }
            //$pdf->Cell(0, $size['h'], 'TCPDF and FPDI');
            // echo $template->getId();
            $pdf->Output($this->getContainer()->get('kernel')->getRootDir() . '/../web/folder/pdf' . $template->getId() . "-$i.pdf", 'F');
            $i++;
        }
    }
    public function csv($file){
        $row = 1;
        $array = array();
        $marray = array();
        $handle = fopen($file, 'r');
        if ($handle !== FALSE) {
            while (($data = fgetcsv($handle, 0, ',')) !== FALSE) {
                if ($row === 1) {
                    $num = count($data);
                    for ($i = 0; $i < $num; $i++) {
                        array_push($array, $data[$i]);
                    }
                } else {
                    $c = 0;
                    foreach ($array as $key) {
                        $marray[$row - 1][$key] = $data[$c];
                        $c++;
                    }
                }
                $row++;
            }
        }
        return $marray;
    }
}