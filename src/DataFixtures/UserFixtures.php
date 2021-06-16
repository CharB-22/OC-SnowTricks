<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        for ($i = 0; $i< 10; $i++)
        {
            $user = new User();
            

            $user->setUsername($faker->userName())
                ->setPassword($faker->password())
                ->setEmail($faker->email())
                ->setRoles(['ROLE_USER'])
                ->setProfilePicture($faker->imageUrl(null, 150, 150));

            $manager->persist($user);
        }

        // Create one superAdmin

        $user = new User();

        $user->setUsername('SuperAdmin')
            ->setPassword($this->encoder->encodePassword(
                $user,
                'SuperAdmin'))
            ->setEmail('superAdmin@gmail.com')
            ->setRoles(['ROLE_ADMIN', 'ROLE_USER'])
            ->setProfilePicture('https://cdn5.vectorstock.com/i/1000x1000/72/74/female-avatar-profile-icon-round-woman-face-vector-18307274.jpg');

        $manager->persist($user);

        $manager->flush();
    }
}
