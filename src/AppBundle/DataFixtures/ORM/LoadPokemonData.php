<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Attack;
use AppBundle\Entity\Evolution;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Pokemon;

class LoadPokemonData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pokemonTypes = [
            'Electric' => ['Pichu', 'Pikachu', 'Raichu'],
            'Grass/Poison' => ['Bulbasaur', 'Ivysaur', 'Venusaur'],
            'Water' => ['Squirtle', 'Wartortle','Blastoise'],
        ];

        foreach($pokemonTypes as $type=>$pokemons) {
            foreach($pokemons as $pokemon) {
                $entity = new Pokemon();
                $entity->setName($pokemon);
                $entity->setType($this->getReference($type));
                $this->setReference($pokemon, $entity);
                $manager->persist($entity);
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
        return 3;
    }
}