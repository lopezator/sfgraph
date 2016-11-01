<?php

namespace AppBundle\GraphQL;

use AppBundle\GraphQL\Field\PokemonField;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config->getQuery()->addFields([
            new PokemonField()
        ]);
    }
}

