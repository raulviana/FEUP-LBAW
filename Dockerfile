FROM php:7.2-apache

# Copy static HTML pages (when building a new image)
COPY view /var/www/html

# Start command
COPY docker_run.sh /docker_run.sh
CMD sh /docker_run.sh
