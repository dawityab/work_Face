<?php

namespace App\Controller;

use App\Service\FileUploader;
use App\Entity\Company;
use App\Entity\Job;
use App\Entity\Apply;
use App\Form\JobType;
use App\Form\ApplyType;
use App\Form\JobSearchType;
use App\Form\SearchType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\ResolvedFormType;



class JobController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $entityManager, SessionInterface $sessionInterface): Response
    {
        $home = 'Home';
        // $data = $request->query->all();
        // $sessionFormData  = $sessionInterface->get('data');
        $jobs = $doctrine->getManager()->getRepository(Job::class)->findAll();
        
        //  $myJob = new Job();
       

        $form = $this->createForm(JobSearchType::class);
        $form->handleRequest($request);

        
        
        if ($form->isSubmitted() && $form->isValid()) {
             $data = $form->getData();
            // $jobName = $data->getJobName();
            // $jobCatagory = $data->getJobCatagory();
            // $jobLocation = $data->getJobLocation();
            $searchJobs = $entityManager->getRepository(Job::class)->findByCriteria($data);
            return $this->render('job/search.html.twig', ['searchJobs' => $searchJobs]);
      
        }
        // else{
            // $searchJobs = $entityManager->getRepository(Job::class)->findAll();
        // }
       
     
        return $this->render('job/index.html.twig', [

            'form' => $form->createView(),
           
            'home' => $home,
            'jobs' => $jobs
            
        ]);

        // return $this->render('job/search.html.twig', ['searchJobs' => $searchJobs]);
      
      
        // $myEntity1 = new MyEntity1();
        // $myEntity2 = new MyEntity2();
       
        // $form = $this->createForm(JobType::class);
      
        // $form->handleRequest($request);
       
        // if ($form->isSubmitted() && $form->isValid()) {
        //     $data = $form->getData();
        //     $sessionInterface->set('data', $data);
        //     return $this->render('job/index.html.twig', ['data' => $data, 'jobs' => $jobs]);
        // }

        // return $this->renderForm('job/index.html.twig', [
            // 'form' => $form,
            
        // ]);


        // return $this->render('job/index.html.twig', [
            
            
        // ]);
    }
    
    #[Route('/job', name: 'app_job')]
    public function job( ManagerRegistry $doctrine): Response
    {

       
        $jobs = $doctrine->getManager()->getRepository(Job::class)->findAll();
        

        $details = 'All Jobs';
       

        return $this->render('job/job.html.twig', [
           "jobs" => $jobs,
           'details' => $details,
            "controller_name" => "JobController"

        ]);
    }
          
    #[Route('/details/{id}', name: 'app_detail')]
    public function appDetails( $id, ManagerRegistry $doctrine): Response
    {
        $job = $doctrine->getManager()->getRepository(Job::class)->find($id);
    //   dd($event);
        $details = 'Details of the Job';
        return $this->render('job/details.html.twig', [
            'details' => $details,
            'job' => $job
        ]);
    }
   
    #[Route('/create', name: 'app_create')]
    public function appCreate(Request $request, ManagerRegistry $doctrine, FileUploader $fileUploader ): Response
    {
        $job = new Job();
        //  dd($product);
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $pictureFile = $form->get('jobIamge')->getData();
            if ($pictureFile) {
            $pictureFileName = $fileUploader->upload($pictureFile);
            //$pictureFileName = $fileUploader->upload($pictureFile);
                     
            
            $job->setJobIamge($pictureFileName);
            }
            $jobForm = $form->getData();
            //  dd($product);
            $em = $doctrine->getManager();
            $em ->persist($jobForm);
            $em->flush();
            
            $this->addFlash("warning", "New Job Added");
            return $this->redirectToRoute("app_job");
           
        }
        return $this->render('job/create.html.twig', [
           "form" => $form->createView()
          
           
        ]);
    }
    #[Route('/edit/{id}', name: 'app_edit')]
    public function appEdit(Request $request,$id,ManagerRegistry $doctrine,FileUploader $fileUploader): Response
    {
       
        $job = $doctrine->getManager()->getRepository(Job::class)->find($id);
        //  dd($product);
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $pictureFile = $form->get('jobIamge')->getData();
            //pictureUrl is the name given to the input field
            if ($pictureFile) {
            $pictureFileName = $fileUploader->upload($pictureFile);
            $job->setJobIamge($pictureFileName);
            }
            $job = $form->getData();
            //  dd($product);
            $em = $doctrine->getManager();
            $em ->persist($job);
            $em->flush();
            $this->addFlash("success", "This job has been updated");

            return $this->redirectToRoute("app_job");
        }
        return $this->render('job/edit.html.twig', [
            "form" => $form->createView()
           
        ]);
    }
    #[Route('/delete/{id}', name: 'app_delete')]
    public function Delete($id, ManagerRegistry $doctrine): Response
    {
        $job = $doctrine->getManager()->getRepository(Job::class)->find($id);
        $em = $doctrine->getManager();
        
        $em->remove($job);
        
        $em->flush();

        $this->addFlash("success", "One Job has removed");

        return $this->redirectToRoute('app_job');
    }
    #[Route('/apply', name: 'app_apply')]
    public function appApply(Request $request, ManagerRegistry $doctrine, FileUploader $fileUploader ): Response
    {
    $apply = new Apply();
    //  dd($product);
    $form = $this->createForm(ApplyType::class, $apply);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
       
        $cvFile = $form->get('cv')->getData();
        $attachmentsFile = $form->get('attachments')->getData();
        $coverLetterFile = $form->get('coverLetter')->getData();
        if ($cvFile && $attachmentsFile && $coverLetterFile) {
        $cvFileName = $fileUploader->upload($cvFile);
        $attachmentsFileName = $fileUploader->upload($attachmentsFile);
        $coverLetterFileName = $fileUploader->upload($coverLetterFile);
        
        //$pictureFileName = $fileUploader->upload($pictureFile);
                 
        
        $apply->setCv($cvFileName);
        $apply->setAttachments($attachmentsFileName);
        $apply->setCoverLetter($coverLetterFileName);
        }
        $applyForm = $form->getData();
        //  dd($product);
        $em = $doctrine->getManager();
        $em ->persist($applyForm);
        $em->flush();
        
        $this->addFlash("warning", "Thank you for applying");
        return $this->redirectToRoute("app_job");
       
    }
    return $this->render('job/apply.html.twig', [
       "form" => $form->createView()
      
       
    ]);


    }
   
 
}
