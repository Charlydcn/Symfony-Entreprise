<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(EmployeRepository $employeRepository): Response
    {
        // $employes = $entityManager->getRepository(employe::class)->findAll();
        // SELECT * FROM employe ORDER BY nom ASC
        $employes = $employeRepository->findBy([], ["nom" => "ASC"]);
        
        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
        ]);
    }

    #[Route('/employe/new', name: 'new_employe')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employe = new Employe();
        
        // On créer le formulaire à partir du formType (EmployeType)
        $form = $this->createForm(EmployeType::class, $employe);

        //  On 'handle' la requête
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide,
        if ($form->isSubmitted() && $form->isValid()) {

            // on récupère les données
            $employe = $form->getData();
            // persist = prepare PDO
            $entityManager->persist($employe);
            // flush = execute PDO
            $entityManager->flush();

            return $this->redirectToRoute('app_employe');
        }
        
        return $this->render('employe/new.html.twig', [
            'addEmployeForm' => $form,
        ]);
    }

    #[Route('/employe/{id}', name: 'show_employe')]
    public function show(Employe $employe) : Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
        ]);
    }
}
