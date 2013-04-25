<?php

namespace Business\OrganisationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CriteriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('full_name')
            ->add('cfamily','entity', array(
            'class' => 'Business\OrganisationBundle\Entity\Cfamily',
            'property' => 'name',
            'multiple' => false,
            'required' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Business\OrganisationBundle\Entity\Criteria'
        ));
    }

    public function getName()
    {
        return 'business_organisationbundle_criteriatype';
    }
}
