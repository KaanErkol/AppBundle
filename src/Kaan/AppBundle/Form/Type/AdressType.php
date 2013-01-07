<?php

namespace Kaan\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('shippingname')
            ->add('country','country')
            ->add('city')
            ->add('postcode')
            ->add('adress')
            ->add('phone')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kaan\AppBundle\Entity\Adress'
        ));
    }

    public function getName()
    {
        return 'kaan_appbundle_adresstype';
    }
}
