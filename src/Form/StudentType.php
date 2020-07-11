<?php

namespace App\Form;


use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Validator\Constraints\Length; 


class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $choices = [
        //     'texte 1' => 'fellow',
        //     'texte 2' => 'no fellow'
        // ];

        $builder
            // ->add('registration_number' )
            ->add('firstname', TextType::class, [
                                    
            ])
            ->add('lastname', TextType::class)
            ->add('phone')
            ->add('Email')
            ->add('date_of_birth')

            //  ->add('user_type' ,ChoiceType::class,[
            //      'attr'=>[
            //          'class'=>"user-type" ,
            //      ],
            //       'choices' =>[
            //           'type' => "" ,
            //         'boursier' => "fellow"  ,
            //         ' non boursier' => "no fellow"  ,

            //       ] 
            //  ]) 

            ->add('fellow_price', ChoiceType::class, [
                'attr' => [
                    'class' => "user-type",
                ],
                'choices' => [ 
                    'none' => "0" ,
                    '40000' => "40000",
                    '20000' => "20000",
                ]
            ])

            ->add('adress')
            ->add('room');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
