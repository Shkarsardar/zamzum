<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, $options)
    {
        $options=['attr'=>['class'=>'form-control']];
        $builder->add('email',EmailType::class,$options)
        ->add('username',TextType::class,$options)
        ->add('password',RepeatedType::class,
        [
            'type'=>PasswordType::class,
            'first_options'=>['label'=>'password','attr'=>$options['attr']],
            'second_options'=>['label'=>'retype password','attr'=>$options['attr']]
            

            

        ]);
    }
    
}








?>