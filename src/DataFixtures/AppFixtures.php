<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Project;
use App\Entity\Category;
use App\Entity\Comment;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ! Catégories
        $webDevelopmentCategory = new Category();
        $webDevelopmentCategory->setName('Web Development');
        $manager->persist($webDevelopmentCategory);

        $mobileAppCategory = new Category();
        $mobileAppCategory->setName('Mobile App');
        $manager->persist($mobileAppCategory);



        // ! Projects
        $project1 = new Project();
        $project1->setTitle('Projet 1')
            ->setDescription('Description du projet 1')
            ->setImage('image1.jpg')
            ->setProjectUrl('lien_projet1.com')
            ->setStart(new \DateTime('2023-01-15'))
            ->setEnd(new \DateTime('2023-07-15'))
            ->setCategory($webDevelopmentCategory);
        $manager->persist($project1);

        $project2 = new Project();
        $project2->setTitle('Projet 2')
            ->setDescription('Description du projet 2')
            ->setImage('image2.jpg')
            ->setProjectUrl('lien_projet2.com')
            ->setStart(new \DateTime('2023-01-15'))
            ->setEnd(new \DateTime('2023-07-15'))
            ->setCategory($mobileAppCategory);
        $manager->persist($project2);


        $project3 = new Project();
        $project3->setTitle('Projet 3')
            ->setDescription('Description du projet 3')
            ->setImage('image3.jpg')
            ->setProjectUrl('lien_projet3.com')
            ->setStart(new \DateTime('2023-01-15'))
            ->setEnd(new \DateTime('2023-07-15'))
            ->setCategory($webDevelopmentCategory);
        $manager->persist($project3);




        $project4 = new Project();
        $project4->setTitle('Projet 4')
            ->setDescription('Description du projet 4')
            ->setImage('image4.jpg')
            ->setProjectUrl('lien_projet4.com')
            ->setStart(new \DateTime('2023-01-15'))
            ->setEnd(new \DateTime('2023-07-15'))
            ->setCategory($webDevelopmentCategory);
        $manager->persist($project4);


        // ! Commentaires
        $comment1 = new Comment();
        $comment1->setProject($project1)
            ->setCommentText('Super projet !')
            ->setUserName('Utilisateur1')
            ->setCreatedAt(new \DateTimeImmutable('2023-08-09'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setProject($project1)
            ->setCommentText('Bravo pour le travail !')
            ->setUserName('Utilisateur2')
            ->setCreatedAt(new \DateTimeImmutable('2023-08-09'));
        $manager->persist($comment2);


        $comment3 = new Comment();
        $comment3->setProject($project2)
            ->setCommentText('Bon projet !')
            ->setUserName('Utilisateur3')
            ->setCreatedAt(new \DateTimeImmutable('2023-08-09'));
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setProject($project3)
            ->setCommentText('Bravo pour le travail !')
            ->setUserName('Utilisateur6')
            ->setCreatedAt(new \DateTimeImmutable('2023-08-09'));
        $manager->persist($comment4);

        $manager->flush();







        // // Création de quelques projets de test
        // $project1 = new Project();
        // $project1->setTitle('Projet 1');
        // $project1->setDescription('Description du projet 1');
        // // Ajoutez d'autres propriétés et détails du projet
        // $manager->persist($project1);

        // $project2 = new Project();
        // $project2->setTitle('Projet 2');
        // $project2->setDescription('Description du projet 2');
        // // Ajoutez d'autres propriétés et détails du projet
        // $manager->persist($project2);

        // // Enregistrez les projets en base de données
        // $manager->flush();
    }
}
