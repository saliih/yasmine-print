<?php

namespace Main\FrontBundle\Controller\Rest;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\BrowserKit\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use PrintBundle\Entity\Options;

class TemplateController extends Controller
{
    /**
     * GET Route annotation.
     * @Get("/{id}/templates")
     */
    public function gettemplatesAction($id)
    {
        $category = $this->getDoctrine()->getRepository('MainFrontBundle:category')->find($id);
        $template = $this->getDoctrine()->getRepository('MainFrontBundle:tplprod')->findBy(array("category" => $category));

        return $template;
    }
}
