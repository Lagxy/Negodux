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

echo "Clearing and caching config..."
php artisan config:clear
php artisan config:cache

echo "Starting Laravel server..."

# Start the server
php artisan serve --host=0.0.0.0 --port=${PORT}
