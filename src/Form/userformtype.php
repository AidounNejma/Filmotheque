<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class , [
                'label' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre prénom...'
                ],
            ])
            ->add('lastname', TextType::class , [
                'label' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre nom...'
                ],
            ])
            ->add('email', TextType::class , [
                'label' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre email...'
                ],
            ])
            ->add('password', TextType::class , [
                'label' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre mot de passe...'
                ]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }     
}
?>