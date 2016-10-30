<?php

namespace AppBundle\GraphQL;

use AppBundle\GraphQL\Field\PokemonField;
use AppBundle\GraphQL\Type\PokemonType;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config->getQuery()->addFields([
            new PokemonField(),
        ]);

        /*$config->getQuery()->addFields([
            'hello' => [
                'type'    => new StringType(),
                'args'    => [
                    'name' => [
                        'type' => new StringType(),
                        'default' => 'Stranger'
                    ]
                ],
                'resolve' => function ($context, $args) {
                    return 'Hello ' . $args['name'];
                }
            ]
        ]);*/
    }
}

