<?php
/**
 * Created by PhpStorm.
 * User: youssef
 * Date: 22/11/2015
 * Time: 13:59
 */

namespace Main\BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\BackBundle\Entity\category;
use Main\BackBundle\Form\categoryType;

class PagesController extends Controller
{
    public function indexAction(Request $request) {
        $pages = $this->getDoctrine()->getRepository('MainBackBundle:pages')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $pages, $request->query->get('page', 1)/* page number */, 20/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_pages"), array());
        return $this->render('MainBackBundle:page:index.html.twig', array('entities' => $pages,
            'pagination' => $pagination));
    }


    public function addAction() {
        $pages = new pages();
        $form = $this->createForm(new pagesType(), $pages);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($pages);
                $em->flush();
                return $this->redirect($this->generateUrl('back_pages'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_pages"), array());
        return $this->render('MainBackBundle:pages:edit.html.twig', array('form' => $form->createView(), "pages" => $pages));
    }

    public function editAction($id) {
        $request = $this->get('request');
        $pages = $this->getDoctrine()
            ->getRepository('MainBackBundle:pages')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new pagesType(), $pages);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_pages'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_pages"), array());
        return $this->render('MainBackBundle:pages:edit.html.twig', array('form' => $form->createView(), "pages" => $pages, 'id' => $id,));
    }

    public function deleteAction(pages $pages) {
        if (!$pages) {
            throw $this->createNotFoundException('No pages found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($pages);
        $em->flush();

        return $this->redirect($this->generateUrl('back_pages'));
    }
}