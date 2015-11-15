<?php

namespace User\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\Contract;
use User\UserBundle\Form\ContractType;
use Back\DashBundle\Common\Tools;
use Back\DashBundle\Entity\Notification;
use Back\DashBundle\Constant;

class ContractController extends Controller
{

    public function indexAction($user_id, Request $request)
    {
        $contract = $this->getDoctrine()
            ->getRepository('UserUserBundle:Contract')
            ->findBy(array("user" => $user_id));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $contract, $request->query->get('page', 1)/* page number */, 25/* limit per page */
        );
        return $this->render('UserUserBundle:Contract:index.html.twig', array('entities' => $contract, 'user_id' => $user_id,
            'pagination' => $pagination));
    }

    public function showAction($user_id, $id)
    {
        $request = $this->get('request');
        $contract = $this->getDoctrine()
            ->getRepository('UserUserBundle:Contract')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ContractType(), $contract);
        $form->handleRequest($request);


        return $this->render('UserUserBundle:Contract:show.html.twig', array('form' => $form->createView(), "entity" => $contract, 'id' => $id, 'user_id' => $user_id,));
    }

    public function addAction($user_id)
    {
        $request = $this->get('request');
        $contract = new Contract();
        $form = $this->createForm(new ContractType(), $contract);
        $form->handleRequest($request);
        $tb = $request->request->get('user_userbundle_contract');
        $user = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($user_id);
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $contract->setUser($user);
                $em->persist($contract);
                $em->flush();

                /*-------------------------------------Notification-----------------------------------------------------------------*/

                $agent = $this->get('security.context')->getToken()->getUser();


                $listUserForNotif = Constant\NotifUser::getContratCollaborateur();
                $libelleNotif = $agent . " a ajouté un nouveau contrat à  " . $contract->getUser();
                $libelleNotif2 = $agent . " a ajouté un nouveau contrat à vous ";
                $lient = "'user_contract_show', { 'user_id': " . $contract->getUser() . " , 'id':".$contract->getId()." }";

                $icone = "icon-money";
                //add notification a current user
                $notification = new Notification();
                $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($contract->getUser()));
                $notification->setName($libelleNotif2);
                $notification->setLien($lient);
                $notification->setIcone($icone);
                $em->persist($notification);
                $em->flush();

                for ($count = 1; $count <= count($listUserForNotif); $count++) {
                    $query = $this->getDoctrine()->getEntityManager()
                        ->createQuery(
                            'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                        )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                    $listUser = $query->getResult();
                    foreach ($listUser as $value) {
                        $notification = new Notification();
                        $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                        $notification->setName($libelleNotif);
                        $notification->setLien($lient);
                        $notification->setIcone($icone);
                        $em->persist($notification);
                        $em->flush();
                    }
                    unset($listUser);

                }

                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('user_contract_homepage', array('user_id' => $user_id)));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('UserUserBundle:Contract:edit.html.twig', array('form' => $form->createView(), "entity" => $contract, "user_id" => $user_id));
    }

    public function editAction($user_id, Contract $contract, $type = null)
    {

        $request = $this->get('request');

        $user = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($user_id);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ContractType(), $contract);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $contract->setUser($user);
            $em->persist($contract);
            $em->flush();
            /*-------------------------------------Notification-----------------------------------------------------------------*/

            $agent = $this->get('security.context')->getToken()->getUser();
            $listUserForNotif = Constant\NotifUser::getContratCollaborateur();

            $libelleNotif = $agent . " a modifié le contrat de   " . $contract->getUser();
            $libelleNotif2 = $agent . " a modifié votre contrat ";
            $lient = $this->generateUrl('user_contract_show', array('user_id' => $contract->getUser(),'id' => $contract->getId()));

            $icone = "icon-money";
            //add notification a current user
            $notification = new Notification();
            $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($contract->getUser()));
            $notification->setName($libelleNotif2);
            $notification->setLien($lient);
            $notification->setIcone($icone);
            $em->persist($notification);
            $em->flush();

            for ($count = 1; $count <= count($listUserForNotif); $count++) {
                $query = $this->getDoctrine()->getEntityManager()
                    ->createQuery(
                        'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                    )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                $listUser = $query->getResult();
                foreach ($listUser as $value) {
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                    $notification->setName($libelleNotif);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();
                }
                unset($listUser);

            }
            $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('user_contract_homepage', array('user_id' => $user_id)));

        } else {
            //echo $form->getErrors();
        }
        return $this->render('UserUserBundle:Contract:edit.html.twig', array('type' => $type, 'form' => $form->createView(), "contract" => $contract, 'id' => $contract->getId(), 'user_id' => $user_id,
        ));
    }


}
