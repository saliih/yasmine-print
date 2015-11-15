<?php
/**
 * Created by Salah Chtioui.
 * User: G50
 * Date: 13/03/2015
 * Time: 11:25
 */
namespace Back\DashBundle\Twig;

use Back\CommandeBundle\Constant\EtatCoupon;
use Back\DashBundle\Common\Tools;

class TwigExtension extends \Twig_Extension
{
    private $doctrine;
    private $context;

    public function __construct(\Doctrine\ORM\EntityManager $em, $context)
    {
        $this->doctrine = $em;
        $this->context = $context;
    }

    public function getFilters()
    {
        return array(
            'listCouponAnnuler' => new \Twig_Filter_Method($this, 'listCouponAnnuler'),
            'getVenduCoupon' => new \Twig_Filter_Method($this, 'getVenduCouponFilter'),
            'getRecuCoupon' => new \Twig_Filter_Method($this, 'getRecuCouponFilter'),
            'getAlias' => new \Twig_Filter_Method($this, 'getAliasFilter'),
            'getPourcentage' => new \Twig_Filter_Method($this, 'getPourcentageFilter'),
            'calculateRatePartner' => new \Twig_Filter_Method($this, 'calculateRatePartnerFilter'),
            'getBigfid' => new \Twig_Filter_Method($this, 'getBigfidFilter'),
            'nombreAcheteurs' => new \Twig_Filter_Method($this, 'getNombreAcheteursFilter'),
            'nombreAcheteursReference' => new \Twig_Filter_Method($this, 'getNombreAcheteursReferenceFilter'),
            'verifExpire' => new \Twig_Filter_Method($this, 'verifExpireFilter'),
            'convertirBigFidToDinar' => new \Twig_Filter_Method($this, 'getBigFidToDinarFilter'),
            'sortticket' => new \Twig_Filter_Method($this, 'sortticketFilter'),
            'getshort' => new \Twig_Filter_Method($this, 'getshortFilter'),
            'soldeBigFidClient' => new \Twig_Filter_Method($this, 'getSoldeBigFidClientFilter'),
            'bannershow' => new \Twig_Filter_Method($this, 'bannershowFilter'),
            'getdeal' => new \Twig_Filter_Method($this, 'getdealFilter'),
            'deferenceDateDeal' => new \Twig_Filter_Method($this, 'deferenceDateDealFilter')
        );
    }

    public function listCouponAnnuler($idCommande)
    {
        $listCoupon=count($this->doctrine->getRepository('BackCommandeBundle:Coupon')->findBy(array("command"=>$idCommande)));
        $couponAnuler=count($this->doctrine->getRepository('BackCommandeBundle:Coupon')->findBy(array("command"=>$idCommande,"vendu"=>6)));
        if($listCoupon == $couponAnuler)
        return true;
        else
            return false;
    }
    public function getdealFilter($id){
        $deal=$this->doctrine->getRepository('BackDealBundle:Deal')->find($id);
        return $deal->getTitle();
    }
    public function deferenceDateDealFilter($d1,$d2){
        if($d1<=$d2){
            $nb=$d1->diff($d2)->days;
        }else{
           $nb=$d1->diff($d2)->days * (-1);
        }
        //echo $nb;
        $class="info";
        if($nb<=2 && $nb>=0){
            $class="error";
        }else if($nb<=4 && $nb>2){
            $class="warning";
        }else if($nb>4){
            $class="success";
        }

        return $class ;
    }
    public function getshortFilter($html)
    {
        $nb = 140; //return $html;
        $html = strip_tags($html);
        if (strlen($html) > $nb) {
            return substr($html, 0, strpos($html, ' ', $nb)) . "...";
        } else {
            return $html;
        }
        return $html;
    }
    public function sortticketFilter($data){
        $newdata=array();
        foreach($data as $value){
            $newdata[$value->getId()]=$value;
        }
        ksort($newdata);
        $newdata=array_values($newdata);
        return $newdata;
    }

    public function verifExpireFilter($idDeal)
    {
        return $this->doctrine->getRepository('BackDealBundle:Deal')->findExpireDeal($idDeal);

    }

    public function getNombreAcheteursReferenceFilter($reference)
    {
        return $this->doctrine->getRepository('BackDealBundle:Deal')->findAcheteurByReference($reference);

    }
    public function getNombreAcheteursFilter($deal)
    {
      return $this->doctrine->getRepository('BackDealBundle:Deal')->findAcheteur($deal);

    }

    public function getSoldeBigFidClientFilter($idClient)
    {
        /*-----terminer------------*/
        return $this->doctrine->getRepository('BackDashBundle:BigFidHistorique')->soldeBigFidClient($idClient);

    }
    public function getBigFidToDinarFilter($bigFid)
    {
        $bigfid=$this->doctrine->getRepository('BackDashBundle:Parameter')->find(1);
        $val=$bigFid/$bigfid->getValeur();
        return  round($val, 2);
    }
    public function getBigfidFilter($price){
        $bigfid=$this->doctrine->getRepository('BackDashBundle:Parameter')->find(1);
        $val=$bigfid->getValeur()*$price;
        return  round($val, 0);
    }
    public function bannershowFilter($file, $target, $lien = "#", $width = 0,  $height= 0)
    {
        $ext = explode(".", $file);
        $ext = array_reverse($ext);
        $extension = $ext[0];
        $extension = strtolower($extension);
        if ($extension == "swf") {
            $html = '
        <OBJECT codeBase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0"   width=' . $width . ' height=' . $height . ' classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
            <PARAM NAME=movie VALUE="' . $file . '">
            <PARAM NAME=quality VALUE=high>
            <PARAM NAME=menu VALUE=false>
            <embed src="' . $file . '" quality="high"  pluginspage="http://www.macromedia.com/go/getflashplayer"  type="application/x-shockwave-flash"  width=' . $width . ' height=' . $height . '></embed>
        </OBJECT>
    ';
        } else {
            $html = "<a href='" . $lien . "'";
            if ($target != 0) {
                $html .= " target='_blank'";
            }
            $html .= " >";
            $html .= "<img src='" . $file . "' class='banner img-responsive col-md-12 col-sm-12' /></a>";
        }

        return $html;

    }

    public function calculateRatePartnerFilter($iduser)
    {
        $user = $this->doctrine->getRepository('UserUserBundle:User')->find($iduser);
        $vote = $this->doctrine->getRepository('UserUserBundle:Voterpartner')->findBy(array('partner' => $user));
        $rate = 0;
        $i = 0;

        foreach ($vote as $value) {
            $rate += $value->getRate();
            ++$i;

        }
        if ($i != 0) {
            $rate = ($rate / $i);
        }
        return number_format($rate, 2, ',', 1);
    }

    public function getPourcentageFilter($total, $valeur)
    {
        return round($valeur * 100 / $total);
    }

    public function getAliasFilter($str)
    {
        $str = strip_tags($str);

        return Tools::string2url($str);
    }

    public static function getVenduCouponFilter($id)
    {
        return EtatCoupon::getItemVenduCoupon($id);
    }

    public static function getRecuCouponFilter($id)
    {
        return EtatCoupon::getItemRecuCoupon($id);
    }

    public function getName()
    {
        return 'twig_extension';
    }
}