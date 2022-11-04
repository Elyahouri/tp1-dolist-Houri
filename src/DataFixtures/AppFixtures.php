<?php

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\Type;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->loadTask($manager);

        $manager->flush();
    }

    public function loadTask(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $type1 = new Type();
        $type1->setType("Réparation");
        $manager->persist($type1);
        $type2 = new Type();
        $type2->setType("Bureautique");
        $manager->persist($type2);

        for ($i=0; $i<4; $i++){
            $faker=Faker\Factory::create('FR-fr');
            $title = $faker->word();
            $description = $faker->text();
            $priority = $faker->numberBetween(1,5);
            $accomplished = $faker->boolean();
            $task = new Task();
            $task->setTitle($title)
                ->setDescription($description)
                ->setPriority($priority)
                ->setAccomplished($accomplished)
                ->addType($type1);


            $manager->persist($task);
        }
        $manager->flush();
    }

}
