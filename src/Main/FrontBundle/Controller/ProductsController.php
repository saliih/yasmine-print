<?php

namespace Main\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        $products = $this->getDoctrine()->getRepository('MainFrontBundle:category')->findBy(array('act' => true));
        return $this->render('MainFrontBundle:Page:products.html.twig', array('products' => $products));
    }
}
