<?php

namespace User\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Common\Tools;
use User\UserBundle\Entity\Voterpartner;

class VoterController extends Controller
{
    public function voteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $request->request;
        $rate = $data->get('rate');
        $vot = $data->get('voter');
        $part = $data->get('partner');
        $voter = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($vot);
        $partner = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($part);
        $testVoter = $this->getDoctrine()->getRepository('UserUserBundle:Voterpartner')->findBy(array('voter' => $vot,'partner'=>$partner));
        foreach($testVoter as $value){
            $em->remove($value);
            $em->flush();
        }


            $vote = new Voterpartner();
            $vote->setPartner($partner);
            $vote->setRate($rate);
            $vote->setVoter($voter);
            $em->persist($vote);
            $em->flush();

echo "true";
        exit;

    }
}