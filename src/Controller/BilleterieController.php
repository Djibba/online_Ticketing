<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function create(): Response
    {
        return $this->render('billeterie/create_B.html.twig');
    }
}
