<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'app_shop')]
    public function index(ProduitRepository $rep): Response
    {
        $produits=$rep ->findAll();
        return $this->render('shop/index.html.twig', [
            'produits' => $produits,
        ]);
    }
}
