<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('username_canonical')
            ->add('email')
            ->add('email_canonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('last_login')
            ->add('confirmation_token')
            ->add('password_requested_at')
            ->add('roles')
            ->add('filepicture')
            ->add('adresse')
            ->add('telephone')
            ->add('remarque')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
