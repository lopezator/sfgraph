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