<?php

namespace App\Form;

use App\Entity\Job;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        // ->add('catagory', EntityType::class, [
        //     'class' => Job::class,
        //     'query_builder' => function(EntityRepository $er) {
        //         return $er->createQueryBuilder('u')
        //         ->orderBy('u.jobCatagory');
        //         },
        //     'choice_label' => 'jobCatagory',
            
        // ])  
        // ->add('jobCatagory', ChoiceType::class, [
        //     'placeholder' => 'Search',
        //     'choices' => ['Administration and Management' => 'Administration and Management', 'Computin and ICT' => 'Computin and ICT', 'Construction and Building' => 'Construction and Building', 'Animator,Design and Art' => 'Animator,Design and Art',
        //     'Education and Training' => 'Education and Training','Health and Safety' => 'Health and Safety', 'Finance and Accounting' => 'Finance and Accounting', 'Food Service' => 'Food Service', 'Transport and Logistic' => 'Transport and Logistic',
        //     'Language and Culture' => 'Language and Culture','Volunteer and Social' => 'Volunteer and Social','Sport and Youth' => 'Sport and Youth', 'Security' => 'Security'],

        //     'label'   => false,
            // 'class' => Job::class,
            // 'query_builder' => function(EntityRepository $er) {
            //     return $er->createQueryBuilder('u')
            //     ->orderBy('u.jobCatagory','ASC');
            //     },
            // 'choice_label' => 'jobCatagory',
            
        // ])  
            // ->add('jobName', EntityType::class, [
            //     'class' => Job::class,
            //     'placeholder' => 'Job Title',
            //     'choice_label' => function(Job $job){
            //         return sprintf('%s', $job->getJobName());  
            //     },
            //     'required' => true 
            // ])
           
            ->add('jobCatagory', EntityType::class, [
                'class' => Job::class,
                // 'choices' => ['Administration and Management' => 'Administration and Management', 'Computin and ICT' => 'Computin and ICT', 'Construction and Building' => 'Construction and Building', 'Animator,Design and Art' => 'Animator,Design and Art',
                // 'Education and Training' => 'Education and Training','Health and Safety' => 'Health and Safety', 'Finance and Accounting' => 'Finance and Accounting', 'Food Service' => 'Food Service', 'Transport and Logistic' => 'Transport and Logistic',
                // 'Language and Culture' => 'Language and Culture','Volunteer and Social' => 'Volunteer and Social','Sport and Youth' => 'Sport and Youth', 'Security' => 'Security'],
  
                'placeholder' => 'Catagory',
                'choice_label' => function(Job $job){
                    return sprintf('%s', $job->getJobCatagory());  
                },
                'required' => true

                
            ])
            // ->add('jobLocation', EntityType::class, [
            //     'class' => Job::class,
            //     'placeholder' => 'Region',
            //     'choice_label' => function(Job $job){
            //         return sprintf(' %s', $job->getJobLocation());  
            //     },
            //      'required' => true
                
            // ])
            ->add('Search', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null
        ]);
    }
}