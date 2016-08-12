<?php

namespace Main\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $products = $this->getDoctrine()->getRepository('MainFrontBundle:category')->findBy(array('act' => true));
        $banner = $this->getDoctrine()->getRepository('MainFrontBundle:banner')->findBy(array(),array("ord"=>"ASC"));
        return $this->render('MainFrontBundle:Default:index.html.twig',
            array(
                'banner'=>$banner,
                'products' => $products
            ));
    }

    public function categoryMenuAction()
    {
        $categories = $this->getDoctrine()->getRepository('MainFrontBundle:category')->findBy(array('act' => true), array('name' => 'ASC'));
        return $this->render('MainFrontBundle:Menu:category.html.twig', array(
            'categories' => $categories
        ));
    }

    public function headerAction()
    {
        return $this->render('MainFrontBundle:Default:header.html.twig');
    }

    public function footerAction()
    {
        $social = $this->getDoctrine()->getRepository('MainFrontBundle:social')->findBy(array(),array('ord'=>'ASC'));
        return $this->render('MainFrontBundle:Default:footer.html.twig',array('social'=>$social));
    }
}
