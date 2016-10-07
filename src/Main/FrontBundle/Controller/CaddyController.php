<?php

namespace Main\FrontBundle\Controller;

use Main\FrontBundle\Entity\cmdorder;
use Main\FrontBundle\Entity\command;
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
        $tab = $this->getCaddy($session);
        return $this->render('MainFrontBundle:Page:panier.html.twig', array(
            'panier' => $tab
        ));
    }
    private function getCaddy($session){
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
        return $tab;
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
    public function ValidateCmdAction(){
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $service = $this->get('tools.utils');
        $session = $request->getSession();
        if($session->has('client')){
            $caddy  = $this->getCaddy($session);
            $clientid = $session->get('client');
            $client = $this->getDoctrine()->getRepository('MainFrontBundle:client')->find($clientid);
            $cmd = new command();
            $cmd->setClient($client);
            $dt = new \DateTime();
            $nbcmd = $this->getDoctrine()->getRepository("MainFrontBundle:command")->findAll();
            $ref = $dt->format("Ymd").(count($nbcmd)+1);
            $cmd->setRef($ref);
            $em->persist($cmd);
            foreach($caddy as $line){
                $ordetail = new cmdorder();
                $prod = $line['prod'];
                $ordetail->setProdid($prod);
                $ordetail->setCmd($cmd);
                $ordetail->setQte(1);
                $ordetail->setPrice($line['opt']);
                $em->persist($ordetail);
            }
            $em->flush();
            return $this->render('MainFrontBundle:Page:validateCmd.html.twig',array(
                "panier"=>$caddy,
                "cmd"=>$cmd,
                "client"=>$client
            ));
        }else{
            return $this->redirect($this->generateUrl('login_Page'));
        }

    }
    public function ConnexionAction(){
        $inscription = new Client();
        $request = $this->get('request');
        $param = $request->request->get('inscription_client');
        $request = $this->get('request');

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new clientType(), $inscription);
        if ($request->getMethod() == 'POST') {

            //$request = $this->get('request');

            $email = $param['email'];
            $localiteId = $request->request->get('localite');
            $adresse = $request->request->get('adresse');
            $indicationAdresse = $request->request->get('indication_adresse');


            $verifMail = $em->getRepository('MainFrontBundle:client')->findBy(array("email" => $email));

            $form->bind($request);
            if ($form->isValid()) {
                //Tools::dump($request->request,true);
                if (count($verifMail) == 0) {
                    $em = $this->getDoctrine()->getManager();
                    $inscription->setUsername($inscription->getEmail());

                    $em->persist($inscription);
                    $em->flush();

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Bienvenue sur Yasmine Presse')
                        ->setFrom('no-reply@yasminepress.com')
                        ->setTo($inscription->getEmail())
                        ->setBody($this->render('MainFrontBundle:Email:register.html.twig', array("client" => $inscription)));

                    $this->get('mailer')->send($message);
                    $this->get('session')->getFlashBag()->set('alert-success', 'Inscription enregistré avec succès');

                    return $this->redirect($this->generateUrl('main_front_homepage'));

                } else {
                    $this->get('session')->getFlashBag()->set('alert-error', 'E-mail existe déjà');

                    return $this->redirect($this->generateUrl('main_front_homepage'));
                }


            } else {
                // echo $form->getErrors();
            }
        }
        return $this->render('MainFrontBundle:Page:login.html.twig',array(
            'form' => $form->createView()
            // "panier"=>$caddy
        ));
    }
    public function loginAction(){
        $request = $this->get('request');
        $session = $request->getSession();
        if ($request->getMethod() == 'POST') {
            $username = $request->request->get('_username');
            $password = $request->request->get('_password');
            $client = $this->getDoctrine()->getRepository("MainFrontBundle:client")->findOneBy(array(
                "username"=>$username,
                "password"=>$password
            ));
            if($client){
                $session->set('client',$client->getId());
                return $this->redirect($this->generateUrl('validate_cmd'));
            }else{
                return $this->redirect($this->generateUrl('login_Page'));
            }

        }
        exit;
    }
}
