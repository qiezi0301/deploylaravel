@servers(['web-1' => 'root@192.168.31.251', 'web-2' => 'root@192.168.31.252', 'web-3' => 'root@192.168.31.202'])

@task('deploy', ['on' => ['web-1', 'web-2', 'web-3'], 'parallel' => true])
    cd /var/www/deploylaravel
    git reset --hard
    git pull origin {{ $branch }}
    chown -R www /var/www
    su - www
    cd /var/www/deploylaravel
    composer install --no-dev
    php artisan migrate --force
@endtask