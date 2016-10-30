<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPokemonEvolutionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pokemonEvolutions = [
            'Pichu' => 'Pikachu',
            'Pikachu' => 'Raichu',
            'Bulbasaur' => 'Ivysaur',
            'Ivysaur' => 'Venusaur',
            'Squirtle' => 'Wartortle',
            'Wartortle' => 'Blastoise'
        ];

        foreach($pokemonEvolutions as $pokemon=>$evolution) {
            $entityPokemon = $this->getReference($pokemon);
            $entityEvolution = $this->getReference($evolution);
            $entityPokemon->setEvolution($entityEvolution);
            $manager->persist($entityEvolution);
            $manager->persist($entityPokemon);
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
        return 5;
    }
}