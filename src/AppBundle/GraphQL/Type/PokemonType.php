<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PokemonType extends AbstractObjectType
{
    public function build($config)
    {
        $config
            ->addField('name', new StringType())
            ->addField('type', new StringType())
            ->addField('attacks', new ListType(new AttackType()))
            ->addField('evolution', new StringType());
    }

    public function getName()
    {
        return "Pokemon";
    }

    public function getOne($id)
    {
        $em = $this->container->get('doctrine')->getManager();
        return $this->pokemonRepository->find($id);
    }
}