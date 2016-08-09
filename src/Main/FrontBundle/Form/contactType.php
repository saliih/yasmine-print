<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class contactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array('label'=>'Nom et Prénom'))
            ->add('email',null,array('label'=>'Email'))
            ->add('gsm',null,array('label'=>'Téléphone'))
            ->add('subject',null,array('label'=>'Sujet'))
            ->add('body',null,array('label'=>'Message'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Main\FrontBundle\Entity\contact'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'main_frontbundle_contact';
    }
    
}
