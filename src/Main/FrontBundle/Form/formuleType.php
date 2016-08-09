<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class formuleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civ', 'choice', array(
                'label' => 'Etat',
                'choices' => array(
                    'Mr.' => 'Mr.',
                    'Mme.' => 'Mme.',
                    'Melle.' => 'Melle.',
                ),
                'attr' => array('class' => 'datepickerField'),
                'empty_value' => 'Choisissez',
                'multiple' => false,
            ))
            ->add('name', null, array('required' => true, 'label' => 'Nom'))
            ->add('pname', null, array('required' => true, 'label' => "Prénom"))
            ->add('datenaisse', 'date', array('widget' => 'single_text',
                'attr' => array('class' => 'datepickerField'),
                'required' => false, 'label' => "Date de naissance", 'format' => 'dd/MM/yyyy'))
            ->add('adress')
            ->add('cp', null, array('required' => false, 'label' => 'Code Postal'))
            ->add('ville', null, array('required' => false, 'label' => 'Ville'))
            ->add('pays', 'choice', array(
                'label' => null,
                'placeholder'=>"Choisissez un pays",
                'choices' => array(
                    "Afghanistan" => "Afghanistan",
                    "Albanie" => "Albanie",
                    "Antarctique" => "Antarctique",
                    "Algérie" => "Algérie",
                    "Samoa Américaines" => "Samoa Américaines",
                    "Andorre" => "Andorre",
                    "Angola" => "Angola",
                    "Antigua-et-Barbuda" => "Antigua-et-Barbuda",
                    "Azerbaïdjan" => "Azerbaïdjan",
                    "Argentine" => "Argentine",
                    "Australie" => "Australie",
                    "Autriche" => "Autriche",
                    "Bahamas" => "Bahamas",
                    "Bahreïn" => "Bahreïn",
                    "Bangladesh" => "Bangladesh",
                    "Arménie" => "Arménie",
                    "Barbade" => "Barbade",
                    "Belgique" => "Belgique",
                    "Bermudes" => "Bermudes",
                    "Bhoutan" => "Bhoutan",
                    "Bolivie" => "Bolivie",
                    "Bosnie-Herzégovine" => "Bosnie-Herzégovine",
                    "Botswana" => "Botswana",
                    "Île Bouvet" => "Île Bouvet",
                    "Brésil" => "Brésil",
                    "Belize" => "Belize",
                    "Îles Salomon" => "Îles Salomon",
                    "Îles Vierges Britanniques" => "Îles Vierges Britanniques",
                    "Brunéi Darussalam" => "Brunéi Darussalam",
                    "Bulgarie" => "Bulgarie",
                    "Myanmar" => "Myanmar",
                    "Burundi" => "Burundi",
                    "Bélarus" => "Bélarus",
                    "Cambodge" => "Cambodge",
                    "Cameroun" => "Cameroun",
                    "Canada" => "Canada",
                    "Cap-vert" => "Cap-vert",
                    "Îles Caïmanes" => "Îles Caïmanes",
                    "Sri Lanka" => "Sri Lanka",
                    "Tchad" => "Tchad",
                    "Chili" => "Chili",
                    "Chine" => "Chine",
                    "Taïwan" => "Taïwan",
                    "Île Christmas" => "Île Christmas",
                    "Îles Cocos (Keeling)" => "Îles Cocos (Keeling)",
                    "Colombie" => "Colombie",
                    "Comores" => "Comores",
                    "Mayotte" => "Mayotte",
                    "République du Congo" => "République du Congo",
                    "Îles Cook" => "Îles Cook",
                    "Costa Rica" => "Costa Rica",
                    "Croatie" => "Croatie",
                    "Cuba" => "Cuba",
                    "Chypre" => "Chypre",
                    "République Tchèque" => "République Tchèque",
                    "Bénin" => "Bénin",
                    "Danemark" => "Danemark",
                    "Dominique" => "Dominique",
                    "République Dominicaine" => "République Dominicaine",
                    "Équateur" => "Équateur",
                    "El Salvador" => "El Salvador",
                    "Guinée Équatoriale" => "Guinée Équatoriale",
                    "Éthiopie" => "Éthiopie",
                    "Érythrée" => "Érythrée",
                    "Estonie" => "Estonie",
                    "Îles Féroé" => "Îles Féroé",
                    "Îles (malvinas) Falkland" => "Îles (malvinas) Falkland",
                    "Fidji" => "Fidji",
                    "Finlande" => "Finlande",
                    "Îles Åland" => "Îles Åland",
                    "France" => "France",
                    "Guyane Française" => "Guyane Française",
                    "Polynésie Française" => "Polynésie Française",
                    "Terres Australes Françaises" => "Terres Australes Françaises",
                    "Djibouti" => "Djibouti",
                    "Gabon" => "Gabon",
                    "Géorgie" => "Géorgie",
                    "Gambie" => "Gambie",
                    "Territoire Palestinien Occupé" => "Territoire Palestinien Occupé",
                    "Allemagne" => "Allemagne",
                    "Ghana" => "Ghana",
                    "Gibraltar" => "Gibraltar",
                    "Kiribati" => "Kiribati",
                    "Grèce" => "Grèce",
                    "Groenland" => "Groenland",
                    "Grenade" => "Grenade",
                    "Guadeloupe" => "Guadeloupe",
                    "Guam" => "Guam",
                    "Guatemala" => "Guatemala",
                    "Guinée" => "Guinée",
                    "Guyana" => "Guyana",
                    "Haïti" => "Haïti",
                    "Îles Heard et Mcdonald" => "Îles Heard et Mcdonald",
                    "Honduras" => "Honduras",
                    "Hong-Kong" => "Hong-Kong",
                    "Hongrie" => "Hongrie",
                    "Islande" => "Islande",
                    "Inde" => "Inde",
                    "Indonésie" => "Indonésie",
                    "République Islamique d'Iran" => "République Islamique d'Iran",
                    "Iraq" => "Iraq",
                    "Irlande" => "Irlande",
                    "Italie" => "Italie",
                    "Côte d'Ivoire" => "Côte d'Ivoire",
                    "Jamaïque" => "Jamaïque",
                    "Japon" => "Japon",
                    "Kazakhstan" => "Kazakhstan",
                    "Jordanie" => "Jordanie",
                    "Kenya" => "Kenya",
                    "République de Corée" => "République de Corée",
                    "Koweït" => "Koweït",
                    "Kirghizistan" => "Kirghizistan",
                    "Liban" => "Liban",
                    "Lesotho" => "Lesotho",
                    "Lettonie" => "Lettonie",
                    "Libéria" => "Libéria",
                    "JLibia" => "Libia",
                    "Liechtenstein" => "Liechtenstein",
                    "Lituanie" => "Lituanie",
                    "Luxembourg" => "Luxembourg",
                    "Macao" => "Macao",
                    "Madagascar" => "Madagascar",
                    "Malawi" => "Malawi",
                    "Malaisie" => "Malaisie",
                    "Maldives" => "Maldives",
                    "Mali" => "Mali",
                    "Malte" => "Malte",
                    "Martinique" => "Martinique",
                    "Mauritanie" => "Mauritanie",
                    "Maurice" => "Maurice",
                    "Mexique" => "Mexique",
                    "Monaco" => "Monaco",
                    "Mongolie" => "Mongolie",
                    "République de Moldova" => "République de Moldova",
                    "Montserrat" => "Montserrat",
                    "Maroc" => "Maroc",
                    "Mozambique" => "Mozambique",
                    "Oman" => "Oman",
                    "Namibie" => "Namibie",
                    "Nauru" => "Nauru",
                    "Népal" => "Népal",
                    "Pays-Bas" => "Pays-Bas",
                    "Antilles Néerlandaises" => "Antilles Néerlandaises",
                    "Aruba" => "Aruba",
                    "Nouvelle-Calédonie" => "Nouvelle-Calédonie",
                    "Vanuatu" => "Vanuatu",
                    "Nouvelle-Zélande" => "Nouvelle-Zélande",
                    "Nicaragua" => "Nicaragua",
                    "Niger" => "Niger",
                    "Nigéria" => "Nigéria",
                    "Niué" => "Niué",
                    "Île Norfolk" => "Île Norfolk",
                    "Norvège" => "Norvège",
                    "Îles Mariannes du Nord" => "Îles Mariannes du Nord",
                    "Îles Marshall" => "Îles Marshall",
                    "Palaos" => "Palaos",
                    "Pakistan" => "Pakistan",
                    "Panama" => "Panama",
                    "Papouasie-Nouvelle-Guinée" => "Papouasie-Nouvelle-Guinée",
                    "Paraguay" => "Paraguay",
                    "Pérou" => "Pérou",
                    "Philippines" => "Philippines",
                    "Pitcairn" => "Pitcairn",
                    "Pologne" => "Pologne",
                    "Portugal" => "Portugal",
                    "Guinée-Bissau" => "Guinée-Bissau",
                    "Timor-Leste" => "Timor-Leste",
                    "Porto Rico" => "Porto Rico",
                    "Qatar" => "Qatar",
                    "Réunion" => "Réunion",
                    "Roumanie" => "Roumanie",
                    "Fédération de Russie" => "Fédération de Russie",
                    "Rwanda" => "Rwanda",
                    "Sainte-Hélène" => "Sainte-Hélène",
                    "Saint-Kitts-et-Nevis" => "Saint-Kitts-et-Nevis",
                    "Anguilla" => "Anguilla",
                    "Sainte-Lucie" => "Sainte-Lucie",
                    "Saint-Pierre-et-Miquelon" => "Saint-Pierre-et-Miquelon",
                    "Saint-Marin" => "Saint-Marin",
                    "Sao Tomé-et-Principe" => "Sao Tomé-et-Principe",
                    "Arabie Saoudite" => "Arabie Saoudite",
                    "Sénégal" => "Sénégal",
                    "Seychelles" => "Seychelles",
                    "Sierra Leone" => "Sierra Leone",
                    "Singapour" => "Singapour",
                    "Slovaquie" => "Slovaquie",
                    "Viet Nam" => "Viet Nam",
                    "Slovénie" => "Slovénie",
                    "Somalie" => "Somalie",
                    "Afrique du Sud" => "Afrique du Sud",
                    "Zimbabwe" => "Zimbabwe",
                    "Espagne" => "Espagne",
                    "Sahara Occidental" => "Sahara Occidental",
                    "Soudan" => "Soudan",
                    "Suriname" => "Suriname",
                    "Svalbard etÎle Jan Mayen" => "Svalbard etÎle Jan Mayen",
                    "Swaziland" => "Swaziland",
                    "Suède" => "Suède",
                    "Suisse" => "Suisse",
                    "République Arabe Syrienne" => "République Arabe Syrienne",
                    "Tadjikistan" => "Tadjikistan",
                    "Thaïlande" => "Thaïlande",
                    "Togo" => "Togo",
                    "Tokelau" => "Tokelau",
                    "Tonga" => "Tonga",
                    "Trinité-et-Tobago" => "Trinité-et-Tobago",
                    "Émirats Arabes Unis" => "Émirats Arabes Unis",
                    "Tunisie" => "Tunisie",
                    "Turquie" => "Turquie",
                    "Turkménistan" => "Turkménistan",
                    "Îles Turks et Caïques" => "Îles Turks et Caïques",
                    "Tuvalu" => "Tuvalu",
                    "Ouganda" => "Ouganda",
                    "Ukraine" => "Ukraine",
                    "Égypte" => "Égypte",
                    "Royaume-Uni" => "Royaume-Uni",
                    "Île de Man" => "Île de Man",
                    "République-Unie de Tanzanie" => "République-Unie de Tanzanie",
                    "États-Unis" => "États-Unis",
                    "Îles Vierges des États-Unis" => "Îles Vierges des États-Unis",
                    "Burkina Faso" => "Burkina Faso",
                    "Uruguay" => "Uruguay",
                    "Ouzbékistan" => "Ouzbékistan",
                    "Venezuela" => "Venezuela",
                    "Wallis et Futuna" => "Wallis et Futuna",
                    "Samoa" => "Samoa",
                    "Yémen" => "Yémen",
                    "Serbie-et-Monténégro" => "Serbie-et-Monténégro",
                    "Zambie" => "Zambie"

                ),
                'attr' => array('class' => ''),
                'empty_value' => 'Choisissez',
                'multiple' => false,
            ))
            ->add('profession', null, array('required' => false, 'label' => 'Profession'))
            ->add('tel', null, array('required' => false, 'label' => 'Téléphone'))
            ->add('email', null, array('required' => true, 'label' => 'E-mail'))
            ->add('sweb', null, array('required' => false, 'label' => 'Site web'))
            ->add('besoin')
            ->add('msg')
            ->add('newsletter',null,array(
        'label' => 'Je désire être informer des nouvelles offres, produits et promotions'));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Main\FrontBundle\Entity\formule'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'formbundle_formule';
    }
}