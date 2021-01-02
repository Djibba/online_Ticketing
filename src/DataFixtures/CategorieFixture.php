<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i <=10 ; $i++) { 
            $categorie = new Categorie();
            $categorie->setNomCategorie("Categorie n°$i");

            $manager->persist($categorie);
        }

        $manager->flush();
    }
}
