Fer:
===

Preparación:

Instalar paquetes de docker y docker-compose

Muy recomendable:

* 1.- Docker como usuario normal:

http://askubuntu.com/questions/477551/how-can-i-use-docker-without-sudo

* 2.- Paths mappings en PHPStorm/Eclipse a no ser que tu ruta sea igual en ambos lados (en el docker suele ser /var/www).

Comandos típicos:

* 1.- Levantar docker: **docker-compose up -d**
* 2.- Entrar en el docker de php-fpm (para limpiar cache, ejecutar composer, etc dentro): **docker-compose exec --user=www-data sfgraph-php-fpm bash**
* 3.- Parar docker: **docker-compose kill**
* 4.- Destruir los dockers: **docker-compose rm -f**
* 5.- Si cambias algo en config y quieres hacer un rebuild: **docker-compose up -d --build**
* 6.- Logs de los contenedores: **docker-compose logs | grep nombredelcontenedor**
* 7.- **Beber birra, cantar mal y mover el esqueleto.**

