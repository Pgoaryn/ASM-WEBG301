<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class,
        [
            'label' => 'Student Name',
            'attr' => [
                'minlength' => 3,
                'maxlength' => 30
            ]
        ])
        ->add('phone', IntegerType::class,
        [
            'label' => 'Phone number'
        ])
        ->add('email', TextType::class,
        [
            'label' => 'Email',
            'minlength' => 3,
            'maxlength' => 40
        ])
        ->add('major', EntityType::class,
        [
            'label' => 'Major',
            'required' => true,
            'class' => Major::class,
            'choice_label' => 'name',
            'multiple' => false,  
            'expanded' => false
        ])
        ->add('classes', EntityType::class,
        [
           'label' => 'Class',
           'required' => true,
           'class' => Classes::class,
            'choice_label' => 'name',
            'multiple' => false, 
            'expanded' => false
        ])
        ->add('semeseter', EntityType::class,
        [
            'label' => 'Semester',
            'required' => true,
            'class' => Semester::class,
            'choice_label' => 'name',
            'multiple' => false,  //nếu có thể chọn nhiều option (relationship: many)
            'expanded' => false
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
