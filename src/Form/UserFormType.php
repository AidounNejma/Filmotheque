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
                    "placeholder"=> 'Saisissez votre prénom...',
                    "id"=> "form2Example11",
                    "class" =>"form-control"
                ],
            ])
            ->add('lastname', TextType::class , [
                'label' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre nom...',
                    "id"=> "form2Example11",
                    "class" =>"form-control"
                ],
            ])
            ->add('email', TextType::class , [
                'label' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre email...',
                    "id"=> "form2Example11",
                    "class" =>"form-control"
                ],
            ])
            ->add('password', PasswordType::class , [
                'label' => false,
                'mapped' => false,
                'attr'=>[
                    "placeholder"=> 'Saisissez votre mot de passe...',
                    "auto-complete"=> 'new-password',
                    "id"=> "form2Example11",
                    "class" =>"form-control"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit comporter {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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
