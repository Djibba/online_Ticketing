<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
     *@Route("/evenement_{id}_edit",name="app_evenement_edit")
     */
    public function create(Request $request, EntityManagerInterface $manager): Response
    {

        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 

            if (!$evenement->getId()) {
                $evenement->setCreatedAt(new \DateTime());
            }
            
            $manager->persist($evenement);
            $manager->flush();

            return $this->redirectToRoute('app_evenement', ['id' => $evenement->getId()]);
        }

        return $this->render('evenement/create.html.twig', [
            'formEvenement'=> $form->createView()
        ]);
    }

    /**
     *@Route("/evenement_{id}_edit",name="app_evenement_edit")
     */
    public function edit(Evenement $evenement,Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createFormBuilder($evenement)
            ->add('nom')
            //->add('image', FileType::class, array('label' => "Image de l'événement"))
            ->add('Lieu')
            ->add('Prix')
            ->add('categorie', EntityType::class,[
                'class' => Categorie::class,
                'choice_label' => 'nomCategorie'
                ])
            ->getForm()
        ;
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 

            $manager->flush();

            return $this->redirectToRoute('app_evenement_single', ['id' => $evenement->getId()]);
        }

        return $this->render('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'formEnv' => $form->createView()
        ]);   
    }

    /**
     * @Route("/evenenemt_{id}_delete", name="app_evenement_delete")
     */
    public function delete(Evenement $evenement, ENtityManagerInterface $manager)
    {
        $manager->remove($evenement);
        $manager->flush();

        return $this->redirectToRoute('app_evenement', ['id' => $evenement->getId()]);
    }

    /**
     * @Route("/evenement_{id}",name="app_evenement_single")
     */
    public function show_single_evenement(EvenementRepository $repoEnv, $id): Response
    {
        
        $evenement = $repoEnv->find($id);
        $evenement->getImage();

        return $this->render('evenement/show_single.html.twig', [
            'evenements' => $evenement
        ]);
    }

    
}