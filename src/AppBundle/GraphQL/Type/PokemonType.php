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
            ->addField('type', [
                'type'    => new StringType(),
                'resolve' => function ($value) {
                    return $value['type']['name'];
                }
            ])
            ->addField('attacks', [
                'type'    => new ListType(new StringType()),
                'resolve' => function ($value) {
                    return array_map(function($attack) {
                        return $attack['name'];
                    }, $value['attacks']);
                }
            ])
            ->addField('evolution', [
                'type'    => new StringType(),
                'resolve' => function ($value) {
                    return $value['evolution']['name'];
                }
            ]);
    }

    public function getName()
    {
        return "Pokemon";
    }
}