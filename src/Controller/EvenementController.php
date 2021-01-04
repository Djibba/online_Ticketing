<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    /**
     * @Route("/evenements",name="app_evenement")
     */
    public function show_evenement(EvenementRepository $repoEven)
    {
        $evenement = $repoEven->findAll();

        return $this->render('evenement/show.html.twig', [
            'evenements' => $evenement
        ]);
    }

    /**
     * @Route("/evenement_new",name="app_evenement_create")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {

        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $evenement->setCreatedAt(new \DateTime());
            
            $manager->persist($evenement);
            $manager->flush();

            return $this->redirectToRoute('app_evenement', ['id' => $evenement->getId()]);
        }

        return $this->render('evenement/create.html.twig', [
            'formEvenement'=> $form->createView()
        ]);
    }

    /**
     * @@Route("/evenement/{id}",name="app_evenement_single")
     */
    public function show_single_evenement(){
        
        return $this->render('evenement/show_single.html.twig');
    }
}