<?php

namespace Main\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\FrontBundle\Form\formuleType;
use Main\FrontBundle\Entity\formule;
use Main\FrontBundle\Form\contactType;
use Main\FrontBundle\Entity\contact;

class PageController extends Controller
{
    public function indexAction($slug)
    {
        $page = $this->getDoctrine()->getRepository('MainFrontBundle:pages')->findOneBy(array('alias' => $slug));
        return $this->render('MainFrontBundle:Page:index.html.twig', array('page' => $page));
    }

    public function devisAction()
    {
        $request = $this->get('request');
        $formule = new formule();
        $form = $this->createForm(new formuleType(), $formule);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($formule);
                $em->flush();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Yasmine pres Contact')
                    ->setFrom($formule->getEmail())
                    ->setTo('slim.benhamida@icloud.com')
                    ->setBcc('salah.chtioui@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'MainFrontBundle:Default:mail.html.twig',
                            array('form' => $formule)
                        ),
                        'text/html'
                    );
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->set('alert-success', 'Votre message est envoyé avec succes');
                return $this->redirect($this->generateUrl('demande_devis'));
            } else {
                echo $form->getErrors();
            }
        }


        return $this->render('MainFrontBundle:Page:devis.html.twig', array(
            'form' => $form->createView()
        ));
    }
    public function contactAction()
    {
        $request = $this->get('request');
        $formule = new contact();
        $form = $this->createForm(new contactType(), $formule);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($formule);
                $em->flush();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Yasmine press Contact')
                    ->setFrom($formule->getEmail())
                    ->setTo('slim.benhamida@icloud.com')
                    ->setBcc('salah.chtioui@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'MainFrontBundle:Default:mailcnt.html.twig',
                            array('form' => $formule)
                        ),
                        'text/html'
                    );
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->set('alert-success', 'Votre message est envoyé avec succes');
                return $this->redirect($this->generateUrl('form_contact'));
            } else {
                echo $form->getErrors();
            }
        }


        return $this->render('MainFrontBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
