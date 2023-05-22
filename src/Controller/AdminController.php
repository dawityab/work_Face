<?php

namespace App\Controller;
use App\Service\FileUploader;
use App\Entity\Company;
use App\Entity\Job;
use App\Entity\Apply;
use App\Entity\User;
use App\Form\ApplyType;
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



#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    #[IsGranted("ROLE_ADMIN")]
    public function dashboard()
    {
         $this->denyAccessUnlessGranted('ROLE_ADMIN');

    
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
    #[Route('/applier', name: 'app_detail_appliers')]
    public function applier( ManagerRegistry $doctrine): Response
    {

       
       
        $appliers = $doctrine->getManager()->getRepository(Apply::class)->findAll();

        
       

        return $this->render('admin/applier.html.twig', [
           
           "appliers" => $appliers,
          
            "controller_name" => "JobController"

        ]);


       
    }
    #[Route('/users', name: 'app_detail_users')]
    public function Users(ManagerRegistry $doctrine): Response
    {
        $users = $doctrine->getManager()->getRepository(User::class)->findAll();
    //   dd($event);
        $details = 'Details of the Users';
        return $this->render('admin/users.html.twig', [
            'details' => $details,
            'users' => $users
        ]);
    }
    #[Route('/user/{id}', name: 'app_detail_user')]
    public function UserDetail($id, ManagerRegistry $doctrine): Response
    {
        $user = $doctrine->getManager()->getRepository(User::class)->find($id);
    //   dd($event);
        $details = 'Details of the User';
        return $this->render('admin/userDetails.html.twig', [
            'details' => $details,
            'user' => $user
        ]);
    }

    #[Route('/deleteUser/{id}', name: 'app_delete_user')]
    public function DeleteUser($id, ManagerRegistry $doctrine): Response
    {
        $user = $doctrine->getManager()->getRepository(User::class)->find($id);
        $em = $doctrine->getManager();
        
        $em->remove($user);
        
        $em->flush();

        $this->addFlash("success", "One User has removed");

        return $this->redirectToRoute('app_job');
    }

    #[Route('/applier/{id}', name: 'app_detail_applier')]
    public function applierDetail($id, ManagerRegistry $doctrine): Response
    {
        $applier = $doctrine->getManager()->getRepository(Apply::class)->find($id);
    //   dd($event);
        $details = 'Details of the User';
        return $this->render('admin/applierDetails.html.twig', [
            'details' => $details,
            'applier' => $applier
        ]);
    }
    #[Route('/deleteApplier/{id}', name: 'app_delete_applier')]
    public function Delete($id, ManagerRegistry $doctrine): Response
    {
        $applier = $doctrine->getManager()->getRepository(Apply::class)->find($id);
        $em = $doctrine->getManager();
        
        $em->remove($applier);
        
        $em->flush();

        $this->addFlash("success", "One Apllier has removed");

        return $this->redirectToRoute('app_job');
    }

   

}
