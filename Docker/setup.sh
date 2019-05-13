startTime=`date +%s%3N`
cd "$(dirname "$0")"
echo "Setting up the environment..."

echo "Do you want to overwrite the .env (if not, you need to manually update your .env files) [Y/N]? "
read overwriteEnvFiles
if [ $overwriteEnvFiles == "y" ] || [ $overwriteEnvFiles == "Y" ] ; then
    cp ../.env.example ../.env
fi

echo "Starting Docker..."

export MSYS_NO_PATHCONV=1;
docker-compose up --build -d
docker exec ds_php_fpm composer install
docker exec ds_php_fpm php artisan migrate:fresh --seed
docker exec ds_php_fpm php artisan authentication:create:oauth-personal-client
docker exec ds_php_fpm php artisan passport:keys
docker exec ds_php_fpm chgrp -R www-data storage bootstrap/cache
docker exec ds_php_fpm chmod -R ug+rwx storage bootstrap/cache

echo "Have fun :)"
