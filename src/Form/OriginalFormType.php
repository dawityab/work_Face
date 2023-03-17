<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class OriginalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
        ->add('jobName', TextType::class, [
          'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Job title'],
          'label'   => false
        ])
        ->add('jobCatagory', ChoiceType::class, [
          'choices' => ['Administration and Management' => 'Administration and Management', 'Computin and ICT' => 'Computin and ICT', 'Construction and Building' => 'Construction and Building', 'Animator,Design and Art' => 'Animator,Design and Art',
                        'Education and Training' => 'Education and Training','Health and Safety' => 'Health and Safety', 'Finance and Accounting' => 'Finance and Accounting', 'Food Service' => 'Food Service', 'Transport and Logistic' => 'Transport and Logistic',
                        'Language and Culture' => 'Language and Culture','Volunteer and Social' => 'Volunteer and Social','Sport and Youth' => 'Sport and Youth', 'Security' => 'Security'],
          
          'attr' => ['class' => 'form-control form-control-lg form-border m-3 ',  'placeholder' => 'Catgory'],
          'label'   => false
         ])
         ->add('jobDescription', TextType::class, [
          'attr' => ['class' => 'form-control form-control-lg form-border m-3 ', 'placeholder' => 'Description'],
          'label'   => false
         
         ])
         ->add('jobIsactive', ChoiceType::class, [
          'choices' => ['Active' => true, 'inactive' => false], 
          'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Available'],
          'label'   => false

         
          ])
          ->add('jobSalary', IntegerType::class, [
          'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Salary'],
          'label'   => false
        ])
        ->add('jobPostedDate', DateTimeType::class, [
          'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Posted Date'],
          'label'   => false
        ])
      //   ->add('date', DateTimeType::class, [
      //     'attr' => ['style' => 'margin-bottom:15px','placeholder' => 'Event Date']
      //   ])
        //create an Object as $product = new Product;
              //build the form using the file type input
        ->add('jobIamge', FileType::class, [
                'label' => 'Upload Picture',
              //unmapped means that is not associated to any entity property
                'mapped' => false,
              //not mandatory to have a file
                'required' => false,

              //in the associated entity, so you can use the PHP constraint classes as validators
                'constraints' => [
              new File([
                  'maxSize' => '5242880',
                  'mimeTypes' => [
                      'image/png',
                      'image/jpeg',
                      'image/jpg',
                  ],
                  'mimeTypesMessage' => 'Please upload a valid image file',
    ])
], 'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Image'],
   'label'   => false

])
      
        ->add('jobLocation', TextType::class, [
          'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Location of the Job'],
          'label'   => false
        ])
        ->add('companyName', TextType::class, [
          'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Company Name'],
          'label'   => false
        ])
   
        ->add('search', SubmitType::class, [
            // 'label' => 'Submit Job',
            'attr' => ['class' => 'btn btn-outline-info   form-border m-3 px-4', 'placeholder' => 'Sumbit']
           
        ]);

            // add more fields as needed
        ;
    }
}