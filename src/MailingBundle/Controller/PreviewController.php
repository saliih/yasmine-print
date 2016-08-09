<?php

namespace MailingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PreviewController extends Controller
{
    public function indexAction($name)
    {
        $em = $this->getDoctrine()->getManager();
         $id = base64_decode($name) / 58741;
        $mailing = $this->getDoctrine()->getRepository('MailingBundle:modelmailing')->find($id);
        $mailing->setOpened($mailing->getOpened() + 1);
        $em->persist($mailing);
        $em->flush();

        return $this->render('MailingBundle:Sender:appercu.html.twig', array('template' => $mailing));
    }
    public function dropAction($email){
        $em = $this->getDoctrine()->getManager();
        $emaillist = $this->getDoctrine()->getRepository('MailingBundle:mailinglist')->findOneBy(array('email'=>$email));
        if($emaillist!=null) {
            $emaillist->setAct(false);
            $em->persist($emaillist);
            $em->flush();
        }
        exit('merci');
    }
    public function imgAction($email,$name){
        $em = $this->getDoctrine()->getManager();
        $id = base64_decode($name) / 58741;
        //terminer le reste
        exit ;
    }
}
