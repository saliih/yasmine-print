<?php
/**
 * Created by PhpStorm.
 * User: salah
 * Date: 22/03/2016
 * Time: 16:45
 */

namespace MailingBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Parser;

class AppExtension extends \Twig_Extension
{
    private $container;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            'criptidmailing' => new \Twig_Filter_Method($this, 'criptidmailing'),
            'changeurl' => new \Twig_Filter_Method($this, 'changeurl'),
        );
    }
    public function criptidmailing($id){
        return base64_encode($id*58741);
    }
    public function changeurl($html){
        $html = str_replace('../../../','http://emailing.yasminepress.com/',$html);
        $html = str_replace('../../','http://emailing.yasminepress.com/',$html);
        $html = str_replace('../','http://emailing.yasminepress.com/',$html);
        return $html;
    }
    public function getName()
    {
        return 'app_extension';
    }
}