#!/bin/sh
set -e

echo "Waiting for database connection..."
until php -r "
try {
    \$pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 3]
    );
    echo 'connected';
} catch (Exception \$e) {
    exit(1);
}
" 2>/dev/null | grep -q connected; do
    echo "  waiting..."
    sleep 2
done

echo "Running migrations..."
php artisan migrate --force

echo "Seeding initial services..."
php artisan db:seed --class=ServiceSeeder --force 2>/dev/null || true

echo "Creating admin user if not exists..."
php artisan tinker --execute="
if (!App\Models\User::where('email','admin@azeumo.com')->exists()) {
    App\Models\User::create(['name'=>'Steve Azeumo','email'=>'admin@azeumo.com','password'=>bcrypt('ChangeMe2026!')]);
    echo 'Admin created.';
} else {
    echo 'Admin already exists.';
}
" 2>/dev/null || true

echo "Caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting services..."
exec "$@"
