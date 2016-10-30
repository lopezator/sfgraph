<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Type;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $attacks = ['Electric', 'Water', 'Grass/Poison'];

        foreach($attacks as $attack) {
            $entity = new Type();
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
        return 1;
    }
}