SfGraph
=======

The purpose of this project is to have a starting point.

It's a practical example of how to use Symfony3 + GraphQL (Youshido/GraphQLBundle) all packed inside a Docker container 
with PHP7-FPM, Nginx and MySQL.

Query examples
==============

* 1.- This call returns the default value of the GraphQL/Schema.php file:
http://sfgraph.dev:8080/app_dev.php/graphql?query={hello}

* 2.- This call additionally send the name arg to change the default value (Stranger) of the GraphQL/Schema.php file
http://sfgraph.dev:8080/app_dev.php/graphql?query={hello(name:paco)}

GraphQL explorer
================

You also can use the GraphQL query explorer, provided by Youshido GraphQL Bundle:

http://sfgraph.dev:8080/app_dev.php/graphql/explorer

And use it to interact with the GraphQL engine.

Examples
========

There a few examples provided by the bundle located in the vendor/youshido/graphql/examples folder who allow to learn 
how to use GraphQL.

Docs
====

* Youshido Guide:

https://github.com/Youshido/GraphQL

* Official GraphSQL spec:

https://facebook.github.io/graphql/#sec-Language.Query-Document

* Symfony Finland: GraphQL & Symfony

https://www.symfony.fi/entry/graphql-with-php-and-the-symfony-framework

Key concepts of GraphQL
=======================

* The core idea of GraphQL is to send a simple string to the server. This string is then interpreted by the server and it sends back a JSON payload that responds to follows the structure of the query itself.
* The key concept is that the client is the only component of an application that knows best what data is needed for rendering the UI. This means that each part of the UI can fetch declaratively from the server the exact data that it needs, without affecting other parts of the application.
* Overfetching example: Admin users (all), use same endpoint for the public part (just need user and email). 
* REST: There isn't a solution, complex parameters, duplicating code, etc... Adhoc endpoints for coupling views. Violate REST endpoints.
* Switch some logic from the client to the server. Ask for wants to render.
* If you change the data requirements of your components, you don’t need to touch the server. You can just change the data query and the rendering logic of the component and you’re good to go.


