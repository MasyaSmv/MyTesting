<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Имя',
                // 'required' => true,
                // 'constraints' =>[
                //       new Length([
                //            'min' => 3,
                //       ]),
                //       new Regex([
                //             'pattern'=> "/^0[0-9]{8}$/x"
                //       ]),
                //  ],
            ])
            ->add('family', TextType::class, [
                'label' => 'Фамилия',
            ])
            ->add('phone', TextType::class, [
                'label' => 'Телефон',
            ])
            ->add('invited', EntityType::class, [
                'label' => 'Приглашение',
                'class' => User::class,
                'choice_label' => 'name',
                ])
            ->add('company', TextType::class, [
                'label' => 'Организация',
            ])
            ->add('password', repeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Пароль'],
                'second_options' => ['label' => 'Повторите пароль']
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
