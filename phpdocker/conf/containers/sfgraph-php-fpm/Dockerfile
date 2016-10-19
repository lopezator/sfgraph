FROM phpdockerio/php7-fpm:latest

ENV DEBIAN_FRONTEND noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.0-mysql php7.0-intl php7.0-xdebug locate \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/var/www/sfgraph"

# Set permissions
RUN usermod -u 1000 www-data

# Update index
RUN updatedb