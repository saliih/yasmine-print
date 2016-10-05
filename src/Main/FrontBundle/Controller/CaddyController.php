<?php

namespace Main\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\FrontBundle\Entity\client;
use Main\FrontBundle\Form\clientType;

class CaddyController extends Controller
{
    public function panierAction()
    {
        $request = $this->get('request');
        $service = $this->get('tools.utils');
        $session = $request->getSession();
        if (!$session->has('caddy')) {
            $caddy = $session->set('caddy', array());
        } else {
            $caddy = $session->get('caddy');
        }
        //$service->dump($caddy);
        $tab = array();
        foreach ($caddy as $value) {
            $tabx ["prod"]=  $this->getDoctrine()->getRepository("MainFrontBundle:category")->find($value["prodid"]);
           if(isset($value["plisid"])) $tabx ["plis"]=  $this->getDoctrine()->getRepository("MainFrontBundle:plis")->find($value["plisid"]);else $tabx ["plis"]=null;
            if(isset($value["opt"])) $tabx ["opt"]=  $value["opt"];
            $tab[] = $tabx;
        }
        return $this->render('MainFrontBundle:Page:panier.html.twig', array(
            'panier' => $tab
        ));
    }

    public function submitdetailsAction()
    {
        $request = $this->get('request');
        $service = $this->get('tools.utils');
        $session = $request->getSession();

        if (!$session->has('caddy')) {
            $caddy = $session->set('caddy', array());
        } else {
            $caddy = $session->get('caddy');
        }
        if ($request->getMethod() == "GET") {
            $prodid = $request->query->get('prodid');
            $plisid = $request->query->get('plisid');
            $opt = $request->query->get('opt');
            $caddy[$prodid] = array('prodid' => $prodid, 'plisid' => $plisid, 'opt' => $opt);
            $session->set('caddy', $caddy);
            return $this->redirect($this->generateUrl('panier'));
        }
        $client = new client();
        $form = $this->createForm(new clientType(), $client);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $i = 0;
                foreach ($caddy as $key => $value) {
                    if ($i == 0) {
                        $cat = $this->getDoctrine()->getRepository('MainFrontBundle:category')->find($key);
                        $client->setCategory($cat);
                        $client->setPlis(($value['plisid'] != "") ? $value['plisid'] : 0);
                        $client->setOption($value['opt']);
                    }
                    $i++;
                }
                $client->setCaddy($caddy);
                $em = $this->getDoctrine()->getManager();
                $em->persist($client);
                $em->flush();
                /* $message = \Swift_Message::newInstance()
                     ->setSubject('Yasmine press Nouvelle commande')
                     ->setFrom($client->getEmail())
                     ->setTo('slim.benhamida@icloud.com')
                     ->setBcc('salah.chtioui@gmail.com')
                     ->setBody(
                         $this->renderView(
                             'MainFrontBundle:Default:mailcmd.html.twig',
                             array('form' => $client)
                         ),
                         'text/html'
                     );
                 $this->get('mailer')->send($message);*/
                $this->get('session')->getFlashBag()->set('alert-success', 'Votre Commande est envoyé avec succes');
                $session->remove('caddy');
                return $this->redirect($this->generateUrl('submit_details'));
            } else {
                echo $form->getErrors();
            }
        }

        return $this->render('MainFrontBundle:Page:commande.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
