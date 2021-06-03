<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;


class UserFixtures extends Fixture
{
    

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i< 10; $i++)
        {
            $user = new User();
            

            $user->setUsername($faker->userName())
                ->setPassword($faker->password())
                ->setEmail($faker->email())
                ->setProfilePicture($faker->imageUrl(null, 150, 150));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
