#!/bin/bash

echo "Waiting for MySQL to be ready..."

# Maximum wait time: 60 seconds
max_attempts=30
attempt=0

# Try to connect to MySQL
until php -r "try { new PDO('mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')); exit(0); } catch(PDOException \$e) { exit(1); }" 2>/dev/null
do
  attempt=$((attempt + 1))
  if [ $attempt -eq $max_attempts ]; then
    echo "MySQL is not available after 60 seconds, exiting..."
    exit 1
  fi
  echo "MySQL is unavailable (attempt $attempt/$max_attempts) - waiting 2 seconds..."
  sleep 2
done

echo "MySQL is ready! 🚀"
echo "Running migrations..."

# Run migrations
php artisan migrate --force

echo "Running seeders..."

# Run seeders  
php artisan db:seed --force

echo "Optimizing Laravel..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
chmod -R 755 storage bootstrap/cache

echo "Starting web server on port ${PORT:-8080}..."

# Use PHP built-in server with public directory as document root
php -S 0.0.0.0:${PORT:-8080} -t public
