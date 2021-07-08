<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
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

        // Create one superAdmin

        $user = new User();

        $user->setUsername('SuperAdmin')
            ->setPassword($this->encoder->encodePassword(
                $user,
                'SuperAdmin'))
            ->setEmail('superAdmin@gmail.com')
            ->setRoles(['ROLE_ADMIN', 'ROLE_USER'])
            ->setProfilePicture('profile_avatar_testeur.jpg')
            ->setIsVerified(true);

        $manager->persist($user);

        $manager->flush();
    }
}
