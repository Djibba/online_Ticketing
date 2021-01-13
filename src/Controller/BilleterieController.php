<?php

namespace App\Controller;

use App\Entity\Billeterie;
use App\Form\BilleterieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BilleterieController extends AbstractController
{
    /**
     * @Route("/billeterie", name="billeterie")
     */
    public function index(): Response
    {
        return $this->render('billeterie/index.html.twig', [
            'controller_name' => 'BilleterieController',
        ]);
    }

    /**
     * @Route("/billeterie_new", name="app_billeterie_create")
     */
    public function create(Request $request, EntityManagerInterface $manager): Response
    {


        $billeterie = new Billeterie();
        
        $form = $this->createForm(BilleterieType::class, $billeterie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $manager->persist($billeterie);
            $manager->flush();

            return $this->redirectToRoute('app_evenement');
        }


        return $this->render('billeterie/create_B.html.twig', [
            'formBilleterie' => $form->createView()
        ]);
    }
}