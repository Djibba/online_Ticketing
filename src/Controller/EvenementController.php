<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function show_evenement()
    {
        return $this->render('evenement/show.html.twig');
    }

    /**
     * @Route("/evenement_new",name="app_evenement_create")
     */
    public function create()
    {
        return $this->render('evenement/create.html.twig');
    }
}
