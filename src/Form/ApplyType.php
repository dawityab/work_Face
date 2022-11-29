<?php

namespace App\Form;


use App\Entity\Apply;

use DateTime;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;


class ApplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('title', ChoiceType::class, [
                'choices' => ['--' => '--','Dr.' => 'Dr.','Mag.' => 'Mag.'
                            ,'MMag.' => 'MMag.','Prof.' => 'Prof.',
                            'Other' => 'Other'],
                
                 'attr' => ['class' => 'form-control form-control-lg form-border'],
                // 'label'   => false
               ])
               ->add('gender', ChoiceType::class, [
                'choices' => ['Male' => 'Male','Female' => 'Female'
                            ,'Other' => 'Other'],
                
                // 'attr' => ['class' => 'form-control form-control-lg form-border m-3',  'placeholder' => 'Gender'],
                // 'label'   => false
               ])
               ->add('firstName', TextType::class, [
                // 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'First Name'],
                // 'label'   => false
               
               ])
               ->add('lastName', TextType::class, [
                // 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Last Name'],
                // 'label'   => false
               
               ])
               
               ->add('email', EmailType::class, [
                // 'attr' => ['class' => 'form-control form-control-lg form-border m-3',  'placeholder' => 'Email'],
                // 'label'   => false
               ])
               ->add('country', ChoiceType::class, [
                'choices' => ['EU and parment work permit' => 'EU and parment work permit','Not EU but parment work permit' => 'Not EU but parment work permit',
                'Not EU also temporary work permit' => 'Not EU also temporary work permit',
                'Other' => 'Other'],
                // 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Country'],
                // 'label'   => false
               
               ])
               ->add('cv', FileType::class, [
                 'label' => 'Upload CV (PDF file)',
              //unmapped means that is not associated to any entity property
                'mapped' => false,
              //not mandatory to have a file
                'required' => false,

              //in the associated entity, so you can use the PHP constraint classes as validators
                'constraints' => [
              new File([
                'maxSize' => '1024k',
                'mimeTypes' => [
                    'application/pdf',
                    'application/x-pdf',
                  ],
                  'mimeTypesMessage' => 'Please upload a valid PDF file',
    ])
                  
], 
// 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Upload CV'],
  //  'label'   => false

])
                ->add('attachments', FileType::class, [
                     'label' => 'Upload attachments (PDF file)',
                //unmapped means that is not associated to any entity property
                    'mapped' => false,
                //not mandatory to have a file
                    'required' => false,

                //in the associated entity, so you can use the PHP constraint classes as validators
                    'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid PDF file',
                ])
                    
                ], 
                // 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Upload Attachments'],
                    // 'label'   => false

                ])
                ->add('coverLetter', FileType::class, [
                    'label' => 'Upload Cover Letter (PDF file)',
                  //unmapped means that is not associated to any entity property
                    'mapped' => false,
                  //not mandatory to have a file
                    'required' => false,
    
                  //in the associated entity, so you can use the PHP constraint classes as validators
                    'constraints' => [
                  new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf',
                      ],
                      'mimeTypesMessage' => 'Please upload a valid PDF file',
        ])
                      
    ], 
    // 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Upload Cover Letter'],
      //  'label'   => false
    
])

                ->add('save', SubmitType::class, [
    // 'label' => 'Submit Job',
                'attr' => ['class' => 'btn btn-outline-info form-border form-btn-border px-md-5 m-3 btn-sm', 'placeholder' => 'Sumbit']
   
]);
           
    
    }

}