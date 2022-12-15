<?php

namespace App\DataFixtures;

use App\Entity\SurfBoard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SurfBoardFixtures extends Fixture implements DependentFixtureInterface

{
    public const PREFIX = "surfboards_";
    public const SURFBOARDS = [
        [
            'user_id' => 2,
            'Nickname' => 'Rosy',
            'Length' => 9.6,
            'Width' => 23,
            'Thickness' => 3,
            'Type' => 'Longboard',
            'Material' => 'Epoxy',
            'Shaper' => 'Mc Tavish',
            'Brand' => 'Mc Tavish',
            'Review' => 'Very good board',
            'Price' => 900,
        ],
        [
            'user_id' => 2,
            'Nickname' => 'Lucy',
            'Length' => 7.3,
            'Width' => 20,
            'Thickness' => 2.5,
            'Type' => 'Midlength',
            'Material' => 'PU',
            'Shaper' => 'Xavier',
            'Brand' => 'MixMix',
            'Review' => 'Very good board',
            'Price' => 600,
        ],
        [
            'user_id' => 2,
            'Nickname' => 'Margy',
            'Length' => 5.8,
            'Width' => 20,
            'Thickness' => 2.5,
            'Type' => 'twin',
            'Material' => 'PU',
            'Shaper' => 'Al Merrick',
            'Brand' => 'Channel island',
            'Review' => 'Very good board',
            'Price' => 800,
        ],

    ];

    public function load(ObjectManager $manager): void
    {

        foreach (self::SURFBOARDS as $key => $surfBoardIndex) {

            $surf = new SurfBoard();

            $surf->setNickname($surfBoardIndex['Nickname']);
            $surf->setShaper($surfBoardIndex['Shaper']);
            $surf->setBrand($surfBoardIndex['Brand']);
            $surf->setLength($surfBoardIndex['Length']);
            $surf->setMaterial($surfBoardIndex['Material']);
            $surf->setThickness($surfBoardIndex['Thickness']);
            $surf->setWidth($surfBoardIndex['Width']);
            $surf->setPrice($surfBoardIndex['Price']);
            $surf->setReview($surfBoardIndex['Review']);
            $surf->setUser($this->getReference(UserFixtures::PREFIX . $surfBoardIndex['user_id']));

            $this->addReference(self::PREFIX . $key, $surf);
            $manager->persist($surf);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
