<?php

namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BoutiqueController extends AbstractController
{
    #[Route('/boutique', name: 'app_boutique')]
    public function index(EntityManagerInterface $em): Response
    {

        $categorie= $em->getRepository(Categorie::class)->findAll();
    
        return $this->render('frontend/links/navbar.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
