<?php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;

class UserFilterType extends AbstractType
{
    private $formOptions;

    public function __construct($options = array()){
        $this->formOptions = $options;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'entity', array('label' => "Nom", 'empty_value' => 'Choisissez le nom du partenaire',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"PARTENAIRE"%');
                },'property' => 'name',  'multiple' => false,'required' => false,))
            ->add('email', 'entity', array('label' => "E-mail", 'empty_value' => 'Choisissez un email',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"PARTENAIRE"%');
                },'property' => 'email',  'multiple' => false,'required' => false,))
            ->add('region', 'entity', array('label' => "Region", 'empty_value' => 'Choisissez une région',
                'class' => 'BackPlanningBundle:Region', 'property' => 'name', 'multiple' => false,'required' => false,))

            ->add('category', "entity", array(
                'label'=>'Catégorie',
                'required' => false,
                "empty_value" => "Choisir une catégorie...",
                "class" => 'BackPlanningBundle:Category',
                "choices" => $this->formOptions["em"]->getFormOption()));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user_userbundle_filteruser';
    }
}
