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

    public const PREFIX = "user_";
    public const USER = [
        [
            "pseudo" => "admin",
            "email" => "admin@admin.fr",
            "password" => "admin",
            "picture" => "",
            "role" => ["ROLE_ADMIN"],
        ],
        [
            "pseudo" => "MARY",
            "email" => "mary@mary.fr",
            "password" => "mary",
            "picture" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "MARYs",
            "email" => "mary@marys.fr",
            "password" => "marys",
            "picture" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "MARYsf",
            "email" => "mary@marysf.fr",
            "password" => "maryfs",
            "picture" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "MARYgs",
            "email" => "mary@marygs.fr",
            "password" => "margys",
            "picture" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "aMARYs",
            "email" => "amary@marys.fr",
            "password" => "amarys",
            "picture" => "",
            "role" => ["ROLE_USER"]
        ],

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::USER as $key => $userIndex) {
            $user = new User();
            $user
                ->setPseudo($userIndex['pseudo'])
                ->setEmail($userIndex['email'])
                ->setPassword($userIndex['password'])
                ->setPicture($userIndex['picture'])
                ->setRoles($userIndex["role"]);
            $manager->persist($user);
            $this->addReference(self::PREFIX . ($key + 1), $user);

            $manager->flush();
        }
    }
}
