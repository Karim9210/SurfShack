<?php

namespace App\DataFixtures;

use App\Entity\SurfBoard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SurfBoardFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 1; $i <= 20; $i++) {
            $surf = new SurfBoard();
            $surf->setNickname('Surf ' . $i);
            $surf->setShaper('Shaper ' . $i);
            $surf->setBrand('Brand ' . $i);

            $manager->persist($surf);
        }
        $manager->flush();
    }
}
