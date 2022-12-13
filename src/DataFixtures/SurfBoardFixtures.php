<?php

namespace App\DataFixtures;

use App\Entity\SurfBoard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SurfBoardFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $board = new SurfBoard();
        $board->setNickname('Rosy');
        $board->setBrand('Channel island');
        $board->setType('Twin');
        $board->setLength(5.8);
        $board->setWidth(19);
        $board->setThickness(2.8);
        $board->setMaterial('Epoxy');
        $board->setShaper('Al Merrick');
        $board->setReview('Very good board !');
        $board->setPrice(450);

        $manager->persist($board);
        $manager->flush();
    }
}
