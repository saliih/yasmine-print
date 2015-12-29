<?php

namespace Main\BackBundle\Menu;

use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Builder extends ContainerAware
{

    public function createMainMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );
        //file
        $menu->addChild('Accueil', array('route' => 'main_back_homepage', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'dashboard')));
        $menu->addChild('Catégories', array('route' => 'back_category', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'categories')));
        $menu->addChild('Bannière', array('route' => 'back_banner', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'banner')));
        $menu->addChild('Pages de contenue', array('route' => 'back_pages', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'banner')));
        //$menu['Fichier']->addChild('Users', array('route' => 'show_users', 'label' => 'Gestion des utilisateurs'));

/*
        $agent = $menu['Gestion des utilisateurs']->addChild('agent', array('label' => 'Agents',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning')));
        $agent->addChild('planner', array('route' => 'list_planner', 'label' => 'Planificateurs'));
        $agent->addChild('commercial', array('route' => 'list_commercial', 'label' => 'Commerciaux'));
        $agent->addChild('redacteur', array('route' => 'list_redactor', 'label' => 'Rédacteurs'));
        $agent->addChild('caissier', array('route' => 'list_caissier', 'label' => 'Caissiers'));
        $agent->addChild('financier', array('route' => 'list_financier', 'label' => 'Financiers'));
        $agent->addChild('serviceclient', array('route' => 'list_serviceclient', 'label' => 'Service client'));
        $responsable = $menu['Gestion des utilisateurs']->addChild('respo', array('label' => 'Responsables',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning1')));
        $responsable->addChild('responsablecaissier', array('route' => 'list_responsablecaissier', 'label' => 'Responsable des Caisses'));
        $responsable->addChild('chefserviceclient', array('route' => 'list_chefserviceclient', 'label' => 'Chef de service client'));
        $responsable->addChild('daf', array('route' => 'list_daf', 'label' => 'Directeur administratif et financier'));
       $responsable->addChild('directeurcommercial', array('route' => 'list_directeurcommercial', 'label' => 'Directeur commercial'));




        //$menu['Gestion des Utilisateurs']->addChild('Déconnexion', array('route' => 'fos_user_security_logout', 'label' => 'Déconnexion'));
        $menu['Gestion des utilisateurs']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Gestion des utilisateurs']->setLinkAttribute('data-toggle', 'dropdown');

        //planning
        $menu->addChild('Service planification', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Service planification']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Service planification']->setLinkAttribute('data-toggle', 'dropdown');


        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Service planification']->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(), 'label' =>  $value->getName()));
            //$plan->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName()));
        }


        //partner
        $menu->addChild('Service commercial', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );
        /*$menu['Service commercial']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Service commercial']->setLinkAttribute('data-toggle', 'dropdown');

        $menu['Service commercial']->addChild('part', array('route' => 'back_partner', 'label' => 'Gestion des partenaires'));
*/

/*
        //Deal
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Service rédaction' ));

        //service Finnancier
        $menu->addChild('Service financier', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
            'attributes' => array('class' => 'dropdown', 'id' => 'servicefinance') ));
        $menu['Service financier']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Service financier']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Service financier']->addChild('commande', array('route' => 'back_commande', 'label' => 'Gestion des commandes'));
        $menu['Service financier']->addChild('Users', array('route' => 'back_invoice', 'label' => 'Gestion des factures'));
        $menu['Service financier']->addChild('coupon_manager', array('route' => 'coupon_manager', 'label' => 'Récéption des coupons'));
        $menu['Service financier']->addChild('back_remboursement', array('route' => 'back_remboursement', 'label' => 'Remboursement des coupons'));
        $menu->addChild('Service client', array('route' => 'back_client', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'clientservice'))
        );
        $menu['Service client']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Service client']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Service client']->addChild('part', array('route' => 'back_client', 'label' => 'Liste des clients'));
        $menu['Service client']->addChild('ticket', array('route' => 'list_ticket', 'label' => 'Gestion des tickets'));
        $menu['Service client']->addChild('reservation', array('route' => 'front_booking_step1', 'label' => 'Réservation'));

        $menu->addChild('Rapports', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'raport'))
        );
        $menu['Rapports']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Rapports']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Rapports']->addChild('partdeal', array('route' => 'back_reportdeal', 'label' => 'Rapport des deals'));
        $menu['Rapports']->addChild('suivicommande', array('route' => 'back_suivicommande', 'label' => 'Rapport de suivi des commandes'));
        $menu['Rapports']->addChild('partlivraison', array('route' => 'back_reportlivraison', 'label' => 'Rapport des livraisons'));

        $menu->addChild('Utilitaires', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'utilitaires'))
        );
        $menu['Utilitaires']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Utilitaires']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Utilitaires']->addChild('livraison', array('route' => 'coupon_livraison', 'label' => 'Livraison'));
        $menu['Utilitaires']->addChild('SMS', array('route' => 'back_dash_sms', 'label' => 'SMS'));
        $menu['Utilitaires']->addChild('Commentaire', array('route' => 'back_comment', 'label' => 'Commentaires'));
        $menu['Utilitaires']->addChild('Notification', array('route' => 'back_notification', 'label' => ' Mes notifications'));

        //Commande
        /*$menu->addChild('Commandes', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );
        $menu['Commandes']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Commandes']->setLinkAttribute('data-toggle', 'dropdown');



*/

//invoice
/*

        //configuration
        $menu->addChild('Configuration', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Configuration']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Configuration']->setLinkAttribute('data-toggle', 'dropdown');
		$menu['Configuration']->addChild('entreprise', array('route' => 'back_entreprise', 'label' => 'Entreprises'));
        $menu['Configuration']->addChild('bank', array('route' => 'back_bank', 'label' => 'Banques'));
        $menu['Configuration']->addChild('paymentmethod', array('route' => 'back_paymentmethod', 'label' => 'Modes de paiement'));
        $menu['Configuration']->addChild('categ', array('route' => 'back_category', 'label' => 'Catégories'));
        $menu['Configuration']->addChild('region', array('route' => 'back_region', 'label' => 'Régions'));
        $menu['Configuration']->addChild('locality', array('route' => 'back_locality', 'label' => 'Localités'));
        //$menu['Configuration']->addChild('parameter', array('route' => 'back_parameter', 'label' => 'BigFid'));
        //$menu['Configuration']->addChild('regle', array('route' => 'back_regle', 'label' => 'Les règles'));


        $menu['Configuration']->addChild('pages', array('route' => 'back_page_homepage', 'label' => 'Pages statiques'));
        $menu['Configuration']->addChild('sociaux', array('route' => 'back_social_homepage', 'label' => 'Réseaux sociaux'));
        $menu['Configuration']->addChild('banner', array('route' => 'back_banner_homepage', 'label' => 'Bannières publicitaires'));
*/
        return $menu;

    }

}

