<?php

namespace Kaan\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',array(
            'label' => 'Kullanıcı Adı',
            'attr' => array(
                'append_input'=>'<i class="icon-user"></i>'
            )
        ))
            ->add('firstName','text',array(
            'label' => 'İsim',
        ))
            ->add('lastName','text',array(
            'label' => 'Soyisim',
        ))
            ->add('birthDay','date',array(
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy',
            'attr' => array(
                'class' => 'date',
                'placeholder' => 'gg/mm/yyyy',
            )
        ))
            ->add('email','email')
            ->add('password', 'repeated', array (
                'label' => 'Password',
                'type'            => 'password',
                'first_name'      => "Password",
                'second_name'     => "Password-Confirm",
                'second_options'  => array('label'=>'Re Password'),
                'invalid_message' => "The passwords don't match!",
            ));
    }


    public function getName()
    {
        return 'kaan_testbundle_usertype';
    }
}
