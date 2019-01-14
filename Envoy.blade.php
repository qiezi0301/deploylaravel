@servers(['web-1' => 'root@192.168.31.251', 'web-2' => 'root@192.168.31.252'])

@task('deploy', ['on' => ['web-1', 'web-2'], 'parallel' => true])
    cd /home/www/deploylaravel
    git pull origin master
    chown -R nginx:nginx /home/www
    chmod -R 755 /home/www
    composer install --no-dev
    php artisan migrate
@endtask