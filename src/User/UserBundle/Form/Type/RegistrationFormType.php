<?php

namespace User\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $entity = $builder->getData();
        $builder
            ->add('name', 'text', array('label' => 'Utilisateur'))
            ->add('email', 'email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'Username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(

                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de passe',
                    'attr' => array('class' => 'form-control')),
                'second_options' => array('label' => 'Mot de passe (validation)',
                    'attr' => array('class' => 'form-control')),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('enabled', null, array('label' => 'Activé?', 'required' => false))
            ->add('profilePictureFile', 'file', array('label' => "Photo", 'required' => false,'data_class' => null))
            ->add('roles', 'choice', array('label' => 'Type d\'utilisateur',
                    'choices' => array('ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN',
                        'PARTENAIRE' => 'PARTENAIRE',
                        'CAISSIER' => 'CAISSIER',
                        'RESPONSABLECAISSE' => 'RESPONSABLECAISSE',
                        'SERVICECLIENT' => 'SERVICECLIENT',
                        'FINANCIER' => 'FINANCIER',
                        'COMMERCIAL' => 'COMMERCIAL',
                        'REDACTEUR' => 'REDACTEUR',
                        'PALAINER' => 'PALAINER',
                        'CHEFSERVISE' => 'CHEFSERVISE',
                        'CHEFSERVICECLI' => 'CHEFSERVICECLI',
                        'DAF' => 'DAF',
                        'DIRECTEURCOMMERCIAL' => 'DIRECTEURCOMMERCIAL',
                        'CHEFRED' => 'CHEFRED',
                    ), 'required' => true, 'multiple' => true,
                )
            );

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user_userbundle_registration';
    }

}
