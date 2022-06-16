<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use App\Entity\Gite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class GiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");

        $equipements = [];
        
        $equip1 = new Equipement();
        $equip1->setName('lave-linge');
        $manager->persist($equip1);

        $equip2 = new Equipement();
        $equip2->setName('lave-vaisselle');
        $manager->persist($equip2);
        
        $equip3 = new Equipement();
        $equip3->setName('climatisation');
        $manager->persist($equip3);
        
        $equip4 = new Equipement();
        $equip4->setName('télévision');
        $manager->persist($equip4);

        $manager->flush();

        array_push($equipements, $equip1, $equip2, $equip3, $equip4); 

        for ($i=0; $i < 20; $i++) { 
            $gite = new Gite();
            $gite
                ->setNom($faker->streetName)
                ->setDescription($faker->text(250))
                ->setSurface($faker->numberBetween(50, 200))
                ->setChambre(random_int(1,10))
                ->setCouchage(random_int(3,15))
                ->addEquipement($faker->randomElement($equipements));

            $manager->persist($gite);
        }

        $manager->flush();
    }
}
