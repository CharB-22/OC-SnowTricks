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
    
    // Create the Trick Array
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
            ->setProfilePicture('placeholder_profile.png');

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
        ->setProfilePicture('placeholder_profile.png');
    
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

    // Create trick n°2 - Rotations

        // Create the user
    $user = new User();
            
    $user->setUsername($faker->userName())
        ->setPassword($faker->password())
        ->setEmail($faker->email())
        ->setRoles(['ROLE_USER'])
        ->setProfilePicture('placeholder_profile.png');
        
    $manager->persist($user);

        // Create the trick Core
    $trick = new Trick();
    $trickGroup = new TrickGroup();
        
    $trick->setTrickName('Rotations - 180')
        ->setTrickDescription("Le principe est d'effectuer une rotation horizontale pendant le saut, puis d'attérir en position switch ou normal. Un 180 désigne un demi-tour, soit 180 degrés d'angle.")
        ->setCreatedAt($faker->dateTimeBetween('-2 months'))
        ->setModifiedAt($faker->dateTimeBetween('-1 months'))
        ->setTrickGroup($trickGroup->setGroupName($trickGroups[1]))
        ->setUser($user)
        ->setSlug('rotations-180');
            
    $manager->persist($trick);
    $manager->persist($trickGroup);

        // Add the images for Rotation
    $trickImage = new TrickImage();
    $trickImage->setMediaName('rotation_1.jpg')
                ->setTrick($trick);
        
    $manager->persist($trickImage); 


        // Add TrickVideos for Rotations
    $trickVideo = new TrickVideo();

    $trickVideo->setVideoUrl('https://www.youtube.com/embed/oI-umOzNBME')
            ->setTrick($trick);
        
    $manager->persist($trickVideo);
    
    $trickVideo = new TrickVideo();

    $trickVideo->setVideoUrl('https://www.youtube.com/embed/nyOdEmddX9U')
            ->setTrick($trick);
        
    $manager->persist($trickVideo);

        // Create the trick Comments
    for ($i = 0; $i< 5; $i++)
    {
        $comment = new Comment();
            
        $randUser = array_rand($users, 1);
        $comment->setCommentDate($faker->dateTimeBetween('-2 months'))
                ->setCommentContent($faker->paragraph())
                ->setUser($users[$randUser])
                ->setTrick($trick);
    
        $manager->persist($comment);
    }

    // Create trick n°3 - Front flip

        // Create the user
        $user = new User();
            
        $user->setUsername($faker->userName())
            ->setPassword($faker->password())
            ->setEmail($faker->email())
            ->setRoles(['ROLE_USER'])
            ->setProfilePicture('placeholder_profile.png');
            
        $manager->persist($user);
    
            // Create the trick Core
        $trick = new Trick();
        $trickGroup = new TrickGroup();
            
        $trick->setTrickName('Front Flip')
            ->setTrickDescription("Un flip est une rotation verticale. On distingue les front flips, rotations en avant, et les back flips, rotations en arrière. Il est possible de faire plusieurs flips à la suite, et d'ajouter un grab à la rotation")
            ->setCreatedAt($faker->dateTimeBetween('-2 months'))
            ->setModifiedAt($faker->dateTimeBetween('-1 months'))
            ->setTrickGroup($trickGroup->setGroupName($trickGroups[2]))
            ->setUser($user)
            ->setSlug('front_flip');
                
        $manager->persist($trick);
        $manager->persist($trickGroup);
    
            // Add the images for Rotation
        $trickImage = new TrickImage();
        $trickImage->setMediaName('front_flip_1.jpg')
                    ->setTrick($trick);
            
        $manager->persist($trickImage); 
    
    
            // Add TrickVideos for Rotations
        $trickVideo = new TrickVideo();
    
        $trickVideo->setVideoUrl('https://www.youtube.com/embed/eGJ8keB1-JM')
                ->setTrick($trick);

        $manager->persist($trickVideo);
        
            // Create the trick Comments
        for ($i = 0; $i< 7; $i++)
        {
            $comment = new Comment();
                
            $randUser = array_rand($users, 1);
            $comment->setCommentDate($faker->dateTimeBetween('-2 months'))
                    ->setCommentContent($faker->paragraph())
                    ->setUser($users[$randUser])
                    ->setTrick($trick);
        
            $manager->persist($comment);
        }
    
        // Create trick n°4 - Corkscrew

        // Create the user
        $user = new User();
            
        $user->setUsername($faker->userName())
            ->setPassword($faker->password())
            ->setEmail($faker->email())
            ->setRoles(['ROLE_USER'])
            ->setProfilePicture('placeholder_profile.png');
            
        $manager->persist($user);
    
            // Create the trick Core
        $trick = new Trick();
        $trickGroup = new TrickGroup();
            
        $trick->setTrickName('Corkscrew')
            ->setTrickDescription("Une rotation désaxée est une rotation initialement horizontale mais lancée avec un mouvement des épaules particulier qui désaxe la rotation.")
            ->setCreatedAt($faker->dateTimeBetween('-2 months'))
            ->setModifiedAt($faker->dateTimeBetween('-1 months'))
            ->setTrickGroup($trickGroup->setGroupName($trickGroups[3]))
            ->setUser($user)
            ->setSlug('corkscrew');
                
        $manager->persist($trick);
        $manager->persist($trickGroup);
    
            // Add the images for Rotation
        $trickImage = new TrickImage();
        $trickImage->setMediaName('corkscrew_1.jpg')
                    ->setTrick($trick);
            
        $manager->persist($trickImage); 

        $trickImage = new TrickImage();
        $trickImage->setMediaName('corkscrew_2.jpg')
                    ->setTrick($trick);
            
        $manager->persist($trickImage); 
    
    
            // Add TrickVideos for Rotations
        $trickVideo = new TrickVideo();
    
        $trickVideo->setVideoUrl('https://www.youtube.com/embed/IXC_BNYIUOo')
                ->setTrick($trick);

        $manager->persist($trickVideo);
        
            // Create the trick Comments
        for ($i = 0; $i< 2; $i++)
        {
            $comment = new Comment();
                
            $randUser = array_rand($users, 1);
            $comment->setCommentDate($faker->dateTimeBetween('-2 months'))
                    ->setCommentContent($faker->paragraph())
                    ->setUser($users[$randUser])
                    ->setTrick($trick);
        
            $manager->persist($comment);
        }

    // Create trick n°5 - Tail Slide

        // Create the user
        $user = new User();
            
        $user->setUsername($faker->userName())
            ->setPassword($faker->password())
            ->setEmail($faker->email())
            ->setRoles(['ROLE_USER'])
            ->setProfilePicture('placeholder_profile.png');
            
        $manager->persist($user);
    
            // Create the trick Core
        $trick = new Trick();
        $trickGroup = new TrickGroup();
            
        $trick->setTrickName('Tail Slide')
            ->setTrickDescription("Un slide consiste à glisser sur une barre de slide. Le slide se fait soit avec la planche dans l'axe de la barre, soit perpendiculaire, soit plus ou moins désaxé. Un tail slide a l'arrière de la planche sur la barre")
            ->setCreatedAt($faker->dateTimeBetween('-2 months'))
            ->setModifiedAt($faker->dateTimeBetween('-1 months'))
            ->setTrickGroup($trickGroup->setGroupName($trickGroups[4]))
            ->setUser($user)
            ->setSlug('corkscrew');
                
        $manager->persist($trick);
        $manager->persist($trickGroup);
    
            // Add the images for Rotation
        $trickImage = new TrickImage();
        $trickImage->setMediaName('tail_slide_1.jpg')
                    ->setTrick($trick);
            
        $manager->persist($trickImage); 

        $trickImage = new TrickImage();
        $trickImage->setMediaName('tail_slide_2.jpg')
                    ->setTrick($trick);
            
        $manager->persist($trickImage); 
    
    
            // Add TrickVideos for Rotations
        $trickVideo = new TrickVideo();
    
        $trickVideo->setVideoUrl('https://www.youtube.com/embed/HRNXjMBakwM')
                ->setTrick($trick);

        $manager->persist($trickVideo);

        $trickVideo = new TrickVideo();
    
        $trickVideo->setVideoUrl('https://www.youtube.com/embed/KqSi94FT7EE')
                ->setTrick($trick);

        $manager->persist($trickVideo);
        
            // Create the trick Comments
        for ($i = 0; $i< 15; $i++)
        {
            $comment = new Comment();
                
            $randUser = array_rand($users, 1);
            $comment->setCommentDate($faker->dateTimeBetween('-2 months'))
                    ->setCommentContent($faker->paragraph())
                    ->setUser($users[$randUser])
                    ->setTrick($trick);
        
            $manager->persist($comment);
        }

        // Create trick n°6 - Old School

        // Create the user
        $user = new User();
            
        $user->setUsername($faker->userName())
            ->setPassword($faker->password())
            ->setEmail($faker->email())
            ->setRoles(['ROLE_USER'])
            ->setProfilePicture('placeholder_profile.png');
            
        $manager->persist($user);
    
            // Create the trick Core
        $trick = new Trick();
        $trickGroup = new TrickGroup();
            
        $trick->setTrickName('Backside Air')
            ->setTrickDescription("Le terme old school désigne un style de freestyle caractérisée par en ensemble de figure et une manière de réaliser des figures passée de mode, qui fait penser au freestyle des années 1980 - début 1990.")
            ->setCreatedAt($faker->dateTimeBetween('-2 months'))
            ->setModifiedAt($faker->dateTimeBetween('-1 months'))
            ->setTrickGroup($trickGroup->setGroupName($trickGroups[5]))
            ->setUser($user)
            ->setSlug('backside-air');
                
        $manager->persist($trick);
        $manager->persist($trickGroup);
    
            // Add the images for Rotation
        $trickImage = new TrickImage();
        $trickImage->setMediaName('placeholder.png')
                    ->setTrick($trick);
            
        $manager->persist($trickImage); 

        
 
    // Push all the fixtures to the database
    $manager->flush();
    }


}
