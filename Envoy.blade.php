@servers(['web-1' => 'root@192.168.31.251', 'web-2' => 'root@192.168.31.252'])

@task('deploy', ['on' => ['web-1', 'web-2'], 'parallel' => true])
    cd /home/www/deploylaravel
    git reset --hard
    git pull origin {{ $branch }}
    chown -R www:www /home/www
    chmod -R 755 /home/www
    su - www
    cd /home/www/deploylaravel
    composer install --no-dev
    php artisan migrate --force
@endtask