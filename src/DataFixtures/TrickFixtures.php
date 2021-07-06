<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\TrickGroup;
use App\Entity\TrickVideo;
use App\Entity\TrickImage;
use App\Entity\User;
use Faker\Factory;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $trick = new Trick();
        // $manager->persist($product);

        $faker = Factory::create();
    
    // Create the Trick Group
    $trickGroups = ['Grabs', 'Rotations', 'Flips', 'Rotations désaxées', 'Slides', 'Old school'];
    

    // Create random users
    $users = array();
    for ($i = 0; $i< 10; $i++)
    {
        $user = new User();
        

        $user->setUsername($faker->userName())
            ->setPassword($faker->password())
            ->setEmail($faker->email())
            ->setRoles(['ROLE_USER'])
            ->setProfilePicture($faker->imageUrl(null, 150, 150));

        array_push($users, $user);
        $manager->persist($user);
    }    
    // Trick n°1 - Indy
    // Create the user
    $user = new User();
            
    $user->setUsername($faker->userName())
        ->setPassword($faker->password())
        ->setEmail($faker->email())
        ->setRoles(['ROLE_USER'])
        ->setProfilePicture($faker->imageUrl(null, 150, 150));
    
    $manager->persist($user);
    
    // Create the trick Core
    $trick = new Trick();
    $trickGroup = new TrickGroup();
    
    $trick->setTrickName('Indy')
        ->setTrickDescription('Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière.')
        ->setCreatedAt($faker->dateTimeBetween('-2 months'))
        ->setModifiedAt($faker->dateTimeBetween('-1 months'))
        ->setTrickGroup($trickGroup->setGroupName($trickGroups[0]))
        ->setUser($user)
        ->setSlug('indy');
        
    $manager->persist($trick);
    $manager->persist($trickGroup);

    // Create trick Images for trick Indy
    $trickImage = new TrickImage();
    $trickImage->setMediaName('indy-grab-1-60d8a0ceaa8d9.jpg')
                ->setTrick($trick);
    
    $manager->persist($trickImage); 

    $trickImage = new TrickImage();
    $trickImage->setMediaName('indy-grab-2-60d8a0ceab72d.jpg')
                ->setTrick($trick);
    
    $manager->persist($trickImage); 

    $trickImage = new TrickImage();
    $trickImage->setMediaName('indy-grab-3-60dd75f9d7acc.jpg')
                ->setTrick($trick);
    
    $manager->persist($trickImage);

    // Add TrickVideos for Indy
    $trickVideo = new TrickVideo();

    $trickVideo->setVideoUrl('https://www.youtube.com/embed/6yA3XqjTh_w')
        ->setTrick($trick);
    
    $manager->persist($trickVideo); 

    // Create the trick Comments
    for ($i = 0; $i< 10; $i++)
    {
        $comment = new Comment();
        
        $randUser = array_rand($users, 1);
        $comment->setCommentDate($faker->dateTimeBetween('-2 months'))
            ->setCommentContent($faker->paragraph())
            ->setUser($users[$randUser])
            ->setTrick($trick);

        $manager->persist($comment);
    }


        $manager->flush();
    }
}
