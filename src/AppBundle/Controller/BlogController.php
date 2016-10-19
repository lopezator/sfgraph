<?php

namespace AppBundle\Controller;

use AppBundle\BlogQL\LatestPostField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Type\Object\ObjectType;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function indexAction(Request $request)
    {
        $rootQueryType = new ObjectType([
            'name' => 'RootQueryType',
            'fields' => [
                new LatestPostField()
            ]
        ]);

        $processor = new Processor(new Schema([
            'query' => $rootQueryType
        ]));
        $payload = '{ latestPost { title, summary } }';

        $processor->processPayload($payload);
        $response = new JsonResponse($processor->getResponseData(), 200, $this->getParameter('graphql.response.headers'));

        return $response;
    }
}
