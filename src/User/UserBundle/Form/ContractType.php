<?php

namespace User\UserBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContractType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', "choice", array(
                'choices'   => array('0' => 'CDD', '1' => 'CDI', '2' => 'Stage', '3' => 'Freelance'),
                'required'  => false, "required"=>true,))
            ->add('salaire1', null, array( 'label' => "Salaire 1", "required"=>true))
            ->add('salaire2', null, array('label' => "Salaire 2", "required"=>false))
            ->add('starDate', "date", array('widget' => 'single_text','label' => "Début de contrat", "required"=>true, 'format' => 'dd/MM/yyyy'))
            ->add('endDate', "date", array('widget' => 'single_text','label' => "Fin de contrat", "required"=>true, 'format' => 'dd/MM/yyyy'))
            ->add('status', null, array('label' => "Activé?", "required"=>false))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\Contract'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user_userbundle_contract';
    }
}
