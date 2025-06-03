<?php

namespace App\Form;


use App\Entity\Job;

use DateTime;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;



class JobSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('jobDescription')
            ->remove('jobIsactive')
            ->remove('jobSalary')
            ->remove('jobPostedDate')
            ->remove('jobIamge')
            ->remove('companyName')
            ->remove('jobName', TextType::class, [
              'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Job title'],
              'label'   => false
            ])
            ->add('jobCatagory', ChoiceType::class, [
              'placeholder' => 'Catgories',
              'choices' => ['Administration and Management' => 'Administration and Management', 'Computin and ICT' => 'Computin and ICT', 'Construction and Building' => 'Construction and Building', 'Animator,Design and Art' => 'Animator,Design and Art',
                            'Education and Training' => 'Education and Training','Health and Safety' => 'Health and Safety', 'Finance and Accounting' => 'Finance and Accounting', 'Food Service' => 'Food Service', 'Transport and Logistic' => 'Transport and Logistic',
                            'Language and Culture' => 'Language and Culture','Volunteer and Social' => 'Volunteer and Social','Sport and Youth' => 'Sport and Youth', 'Security' => 'Security'],
              
              'attr' => ['class' => 'form-control form-control-lg form-border m-3 '],
              'label'   => false
             ])
             ->add('jobLocation', TextType::class, [
              'attr' => ['class' => 'form-control form-control-lg form-border m-3', 'placeholder' => 'Location of the Job'],
              'label'   => false
            ])
            ->add('search', SubmitType::class, [
              // 'label' => 'Submit Job',
              'attr' => ['class' => 'btn btn-outline-info   form-border m-3 px-4', 'placeholder' => 'Sumbit']
             
          ]);
          
        ;
    }

    public function getParent()
    {
        return OriginalFormType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }
}