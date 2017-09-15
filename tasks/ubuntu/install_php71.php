<?php
declare(strict_types=1);

/**
This task assumes you have set php-packages parameter in your deploy.php
i.e.:
set('php-packages', 'php7.1-gd php7.1-mcrypt php7.1-mbstring php-mongodb php-redis php7.1-intl');
 */

namespace Deployer;

use Deployer\Task\Context;


desc('Install php71-fpm and composer using ppa:ondrej/php');
task('ubuntu:install-php71', function () {
    run('apt-get install -y python-software-properties');
    $result = run('sudo add-apt-repository -y ppa:ondrej/php');
    writeln('<info>Adding ppa:ondrej/php: </info>' . $result);
    $result = run(
        'apt-get -y update && apt-get install composer php7.1-fpm php7.1-opcache ' . get('php-packages', '') . ' -y',
        [
            'timeout' => get('command-timeout'),
        ]
    );
    writeln('<info>Install PHP-FPM: </info>' . $result);
    run('echo "<?php phpinfo();" >> /var/www/html/_pi.php');
})->onRoles('app');