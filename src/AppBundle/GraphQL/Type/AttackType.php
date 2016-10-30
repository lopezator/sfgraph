<?php
namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AttackType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addField('name', new StringType());
    }

    public function getName()
    {
        return "Attack";
    }
}