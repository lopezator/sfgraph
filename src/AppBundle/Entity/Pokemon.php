<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pokemon
 *
 * @ORM\Table(name="pokemon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PokemonRepository")
 */

class Pokemon
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="Attack")
     * @ORM\JoinTable(name="pokemon_attack",
     *      joinColumns={@ORM\JoinColumn(name="pokemon_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="attack_id", referencedColumnName="id", unique=false)}
     *      )
     */
    private $attacks;

    /**
     * @ORM\OneToOne(targetEntity="Pokemon")
     * @ORM\JoinColumn(name="evolution_id", referencedColumnName="id")
     */
    private $evolution;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attacks = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Pokemon
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get attacks
     *
     * @return ArrayCollection
     */
    public function getAttacks()
    {
        return $this->attacks;
    }

    /**
     * Set attacks
     *
     * @param Attack $attack
     *
     * @return Pokemon
     */
    public function addAttack(Attack $attack = null)
    {
        $this->attacks[] = $attack;

        return $this;
    }

    /**
     * Remove attack
     *
     * @param Attack $attack
     */
    public function removeAttack(Attack $attack)
    {
        $this->attacks->removeElement($attack);
    }

    /**
     * Get attacks
     *
     * @return ArrayCollection
     */
    public function getEvolution()
    {
        return $this->evolution;
    }

    /**
     * Set evolutions
     *
     * @param Pokemon $evolution
     *
     * @return Pokemon
     */
    public function setEvolution(Pokemon $evolution = null)
    {
        $this->evolution = $evolution;

        return $this;
    }

    /**
     * Get type
     *
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param Type $type
     *
     * @return Pokemon
     */
    public function setType(Type $type = null)
    {
        $this->type = $type;

        return $this;
    }
}
