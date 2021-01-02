<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Evenement;
use App\Repository\CategorieRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EvenementFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categorie = new Categorie();
        for ($i=20; $i <=29 ; $i++) { 

            $evenement = new Evenement();
            $evenement->setNom("Evenement n°$i")
                      ->setCategorie($categorie->getNomCategorie())
                      ->setImage("image n°$i")
                      ->setLieu("Lieu n°$i")
                      ->setCreatedAt(new \DateTime())
                      ->setPrix(10000);

            $manager->persist($evenement);

        }

        $manager->flush();
    }
}
