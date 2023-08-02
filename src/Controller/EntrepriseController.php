<?php

namespace App\Controller;

// use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
// use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    // public function index(EntityManagerInterface $entityManager): Response
    public function index(EntrepriseRepository $entrepriseRepository): Response
    {
        // $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();
        // SELECT * FROM entreprise WHERE ville = 'STRASBOURG' ORDER BY raisonSociale ASC
        $entreprises = $entrepriseRepository->findBy(["ville" => "STRASBOURG"], ["raisonSociale" => "ASC"]);
        
        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }
}
