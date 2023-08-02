<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
        $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "ASC"]);
        
        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }

    #[Route('/entreprise/new', name: 'new_entreprise')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $entreprise = new Entreprise();
        
        // On créer le formulaire à partir du formType (EntrepriseType)
        $form = $this->createForm(EntrepriseType::class, $entreprise);

        //  On 'handle' la requête
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide,
        if ($form->isSubmitted() && $form->isValid()) {

            // on récupère les données
            $entreprise = $form->getData();
            // persist = prepare PDO
            $entityManager->persist($entreprise);
            // flush = execute PDO
            $entityManager->flush();

            return $this->redirectToRoute('app_entreprise');
        }
        
        return $this->render('entreprise/new.html.twig', [
            'addEntrepriseForm' => $form,
        ]);
    }

    #[Route('/entreprise/{id}', name: 'show_entreprise')]
    public function show(Entreprise $entreprise) : Response
    {
        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
