<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Attack;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAttackData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $attacks = [
            'Agility', 'Thunderbolt', 'Quick Attack',
            'Vine Whip', 'Razor Leaf', 'Take Down',
            'Water Gun', 'Protect', 'Hydro Pump',
        ];

        foreach($attacks as $attack) {
            $entity = new Attack();
            $entity->setName($attack);
            $this->addReference($attack, $entity);
            $manager->persist($entity);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}