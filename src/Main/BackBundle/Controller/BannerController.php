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
use Main\BackBundle\Entity\banner;
use Main\BackBundle\Form\bannerType;

class BannerController extends Controller
{
    public function indexAction(Request $request) {
        $banner = $this->getDoctrine()
            ->getRepository('MainBackBundle:banner')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $banner, $request->query->get('page', 1)/* page number */, 20/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des bannières", $this->generateUrl("back_banner"), array());
        return $this->render('MainBackBundle:banner:index.html.twig', array('entities' => $banner,
            'pagination' => $pagination));
    }


    public function addAction() {
        $banner = new banner();
        $form = $this->createForm(new bannerType(), $banner);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                // $file stores the uploaded PDF file
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $banner->getBrochure();

                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                // Move the file to the directory where brochures are stored
                $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/banner';
                $file->move($brochuresDir, $fileName);

                // Update the 'brochure' property to store the PDF file name
                // instead of its contents
                $banner->setBrochure($fileName);



                $em->persist($banner);
                $em->flush();
                return $this->redirect($this->generateUrl('back_banner'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des bannières", $this->generateUrl("back_banner"), array());
        return $this->render('MainBackBundle:banner:edit.html.twig', array('form' => $form->createView(), "banner" => $banner));
    }

    public function editAction($id) {
        $request = $this->get('request');
        $banner = $this->getDoctrine()
            ->getRepository('MainBackBundle:banner')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new bannerType(), $banner);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_banner'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des bannières", $this->generateUrl("back_banner"), array());
        return $this->render('MainBackBundle:banner:edit.html.twig', array('form' => $form->createView(), "banner" => $banner, 'id' => $id,));
    }

    public function deleteAction(banner $banner) {
        if (!$banner) {
            throw $this->createNotFoundException('No banner found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($banner);
        $em->flush();

        return $this->redirect($this->generateUrl('back_banner'));
    }
}