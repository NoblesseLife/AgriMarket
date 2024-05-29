<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(EntityManagerInterface $em): Response
    {
        $produit = $em->getRepository(Produit::class)->findAll();
        $categorie = $em->getRepository(Categorie::class)->findAll();
        return $this->render('frontend/pages/accueil/index.html.twig', [
            'produit' =>$produit,
            'categorie' =>$categorie,
        ]);
    }
}
