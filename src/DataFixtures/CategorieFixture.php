<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tab = ['Sport', 'Concert','Cinéma', 'Transport','Autres'];
        for ($i=0; $i <=4 ; $i++) { 
            $categorie = new Categorie();
            $categorie->setNomCategorie("$tab[$i]");

            $manager->persist($categorie);
        }

        $manager->flush();
    }
}