<?php

namespace App\Controller;
use App\Service\FileUploader;
use App\Entity\Company;
use App\Entity\Job;
use App\Form\JobType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



//  Require ROLE_ADMIN for *every* controller method in this class.

//  @IsGranted("ROLE_ADMIN")

#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    #[IsGranted("ROLE_ADMIN")]
    public function dashboard()
    {
         $this->denyAccessUnlessGranted('ROLE_ADMIN');

    // or add an optional message - seen by developers
    $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

      
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
     
    #[Route('/job_admin', name: 'admin_job')]
    public function job( ManagerRegistry $doctrine): Response
    {

       
        $jobs = $doctrine->getManager()->getRepository(Job::class)->findAll();
        

        $details = 'All Jobs';
       

        return $this->render('admin/job.html.twig', [
           "jobs" => $jobs,
           'details' => $details,
            "controller_name" => "JobController"

        ]);
    }
    

}
