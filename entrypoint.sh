#!/bin/bash
set -e

# Update Apache port to match Railway provided PORT
sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Run the main container command
exec docker-php-entrypoint apache2-foreground
