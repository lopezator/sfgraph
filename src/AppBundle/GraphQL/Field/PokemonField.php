<?php

namespace AppBundle\GraphQL\Field;

use AppBundle\GraphQL\Type\PokemonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class PokemonField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArgument('id', new NonNullType(new IntType()));
    }

    public function getType()
    {
        return new PokemonType();
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();
        $pokemon = $em->getRepository("AppBundle:Pokemon")->find($args["id"]);

        return json_decode($this->container->get('serializer')->serialize($pokemon, 'json'), true);
    }
}