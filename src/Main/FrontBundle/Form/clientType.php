<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class clientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password','password')
            ->add('title','choice',array('required'=>true,
                'label'=>'Civilité',
                'choices'   => array(
                    'M.'   => 'M.',
                    'Mme' => 'Mme',
                    'Mlle' => 'Mlle',
                ),'empty_value' => 'Veuillez sélectionner',))
            ->add('fname', 'text', array('label'=>"Prénom",'required'=>true))
            ->add('name', 'text', array('label'=>"Nom",'required'=>true))
            ->add('phone')
            ->add('adresse', 'textarea')
            ->add('email')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Main\FrontBundle\Entity\client'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'main_frontbundle_client';
    }
    
}
