<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class dashboardController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'app_admin_dashboard')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/index.html.twig', [
            'controller_name' => 'dashboardController',
        ]);
    }
    #[Route('/redirection', name: 'app_redirection')]
    public function Security(Security $security){
        $user = $security->getUser();
if(in_array('ROLE_USER', $user->getRoles())){
    return $this->redirectToRoute('app_home');
}else{
    return $this->redirectToRoute('app_admin_dashboard');
}
        } 
}
