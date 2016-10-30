<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Pokemon;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPokemonAttackData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pokemonAttacks = [
            'Pichu' => ['Agility', 'Thunderbolt', 'Quick Attack'],
            'Pikachu' => ['Agility', 'Thunderbolt', 'Quick Attack'],
            'Raichu' => ['Agility', 'Thunderbolt', 'Quick Attack'],
            'Bulbasaur' => ['Vine Whip', 'Razor Leaf', 'Take Down'],
            'Ivysaur' => ['Vine Whip', 'Razor Leaf', 'Take Down'],
            'Venusaur' => ['Vine Whip', 'Razor Leaf', 'Take Down'],
            'Squirtle' => ['Water Gun', 'Protect', 'Hydro Pump'],
            'Wartortle' => ['Water Gun', 'Protect', 'Hydro Pump'],
            'Blastoise' => ['Water Gun', 'Protect', 'Hydro Pump'],
        ];

        foreach($pokemonAttacks as $pokemon=>$attacks) {
            $entityPokemon = $this->getReference($pokemon);
            foreach($attacks as $attack) {
                $entityAttack = $this->getReference($attack);
                $entityPokemon->addAttack($entityAttack);
                $manager->persist($entityAttack);
                $manager->persist($entityPokemon);
                $manager->flush();
            }
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 4;
    }
}