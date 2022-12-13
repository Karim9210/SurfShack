<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }


    public function load(ObjectManager $manager): void
    {
        // Création d’un utilisateur de type “contributeur” (= auteur)
        $surfer1 = new User();
        $surfer1->setEmail('surfer1@monsite.com');
        $surfer1->setRoles(['ROLE_CONTRIBUTOR']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $surfer1,
            'surfer1password'
        );

        $surfer1->setPassword($hashedPassword);
        $manager->persist($surfer1);

        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'adminpassword'
        );
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);


        $surfer2 = new User();
        $surfer2->setEmail('surfer2@monsite.com');
        $surfer2->setRoles(['ROLE_CONTRIBUTOR']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $surfer2,
            'surfer2password'
        );

        $surfer2->setPassword($hashedPassword);
        $manager->persist($surfer2);
        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }
}
