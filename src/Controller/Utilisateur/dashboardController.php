<?php

namespace App\Controller\Utilisateur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class dashboardController extends AbstractController
{
    #[Route('/utilisateur/dashboard', name: 'app_utilisateur_dashboard')]
    public function index(): Response
    {
        return $this->render('utilisateur/dashboard/index.html.twig', [
            'controller_name' => 'dashboardController',
        ]);
    }
}
