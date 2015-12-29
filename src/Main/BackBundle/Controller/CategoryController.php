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

class CategoryController extends Controller
{
    public function indexAction(Request $request) {
        $category = $this->getDoctrine()
            ->getRepository('MainBackBundle:category')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $category, $request->query->get('page', 1)/* page number */, 20/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_category"), array());
        return $this->render('MainBackBundle:category:index.html.twig', array('entities' => $category,
            'pagination' => $pagination));
    }


    public function addAction() {
        $category = new category();
        $form = $this->createForm(new categoryType(), $category);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();
                return $this->redirect($this->generateUrl('back_category'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_category"), array());
        return $this->render('MainBackBundle:category:edit.html.twig', array('form' => $form->createView(), "category" => $category));
    }

    public function editAction($id) {
        $request = $this->get('request');
        $category = $this->getDoctrine()
            ->getRepository('MainBackBundle:category')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new categoryType(), $category);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_category'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_category"), array());
        return $this->render('MainBackBundle:category:edit.html.twig', array('form' => $form->createView(), "category" => $category, 'id' => $id,));
    }

    public function deleteAction(category $category) {
        if (!$category) {
            throw $this->createNotFoundException('No category found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($category);
        $em->flush();

        return $this->redirect($this->generateUrl('back_category'));
    }
}