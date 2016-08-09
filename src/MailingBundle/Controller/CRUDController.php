<?php

namespace MailingBundle\Controller;

use MailingBundle\Entity\modelmailing;
use MailingBundle\Entity\processmailing;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class CRUDController extends Controller
{
    public function ajaxsendAction(modelmailing $modelmailing)
    {
        $em = $this->getDoctrine()->getManager();
        $cfg = $this->getDoctrine()->getRepository('MailingBundle:cfgmailing')->find(1);
        $process = $modelmailing->getProcess();
        $i = 0;
        if ($process->count() > 0 && !$modelmailing->getSend()) {
            foreach ($process as $email) {
                if ($i < $cfg->getNumberbywait()) {
                    $sender = $this->get('mailingbundle.sendmail');
                    $sender->setFrom($cfg->getSender());
                    $sender->setReplay($cfg->getReplayemail());
                    $sender->setSubject($modelmailing->getTitle());
                    $html = $this->render('MailingBundle:Sender:htmltosend.html.twig', array(
                        'template' => $modelmailing,
                        'email' => $email
                    ));
                    $sender->setBody($html);
                    $sender->addTo($email->getEmail());
                    $modelmailing->setSended($modelmailing->getSended() + 1);
                    $em->persist($modelmailing);
                    $em->remove($email);
                    $em->flush();
                }
                ++$i;
            }
        }
        if ($process->count() == 0 && !$modelmailing->getSend()) {
            $modelmailing->setSend(true);
            $modelmailing->setFinshed(new \DateTime());
            $em->persist($modelmailing);
            $em->flush();
        }
        $result = $process->count() - $cfg->getNumberbywait();


        $testenvoie = $sender->sendMail();
        if ($testenvoie)
            return new Response(1);
        else
            return new Response(0);
        sleep(5);
        exit;
    }

    public function sendAction(modelmailing $modelmailing)
    {
        $em = $this->getDoctrine()->getManager();
        $cfg = $this->getDoctrine()->getRepository('MailingBundle:cfgmailing')->find(1);
        if ($modelmailing->getProcess()->count() == 0
            && !$modelmailing->getSend()
        ) {
            $i = 0;
            $mailinglist = $this->getDoctrine()->getRepository('MailingBundle:mailinglist')->findBy(array('act' => true));
            foreach ($mailinglist as $mail) {
                $process = new processmailing();
                $process->setModel($modelmailing);
                $process->setEmail($mail->getEmail());
                $em->persist($process);
                ++$i;
            }
            $modelmailing->setTotal($i);
            $em->persist($modelmailing);
            $em->flush();
        }

        return $this->render('MailingBundle:Sender:send.html.twig',
            array(
                'modelmailing' => $modelmailing,
                'cfg' => $cfg,
            )
        );

    }

    public function appercuAction($id)
    {
        $template = $this->getDoctrine()->getRepository('MailingBundle:modelmailing')->find($id);
        return $this->render('MailingBundle:Sender:appercu.html.twig', array('template' => $template));
    }

    public function sendtestAction($id)
    {
        $sender = $this->get('mailingbundle.sendmail');
        $cfg = $this->getDoctrine()->getRepository('MailingBundle:cfgmailing')->find(1);
        $template = $this->getDoctrine()->getRepository('MailingBundle:modelmailing')->find($id);
        $sendto = $this->getDoctrine()->getRepository('MailingBundle:mailinglisttest')->findAll();
        $sender->setFrom($cfg->getSender());
        $sender->setReplay($cfg->getReplayemail());
        $sender->setSubject($template->getTitle());
        $html = $this->render('MailingBundle:Sender:htmltosend.html.twig',
            array('template' => $template,
                'email' => null
            )
        );
        $sender->setBody($html);
        foreach ($sendto as $email) $sender->addTo($email->getEmail());
        $sender->sendMail();
        sleep(5);
        return new RedirectResponse($this->container->get('router')->generate('admin_mailing_modelmailing_list'));
    }
}
