<?php

namespace App\Controller;

use App\Service\FileUploader;
use App\Entity\Company;
use App\Entity\Job;
use App\Form\JobType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class JobController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $home = 'Home';
        
        return $this->render('job/index.html.twig', [
            'home' => $home,
            
        ]);
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
 

}
