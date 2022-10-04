./composer install
touch database/database.sqlite
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan test
