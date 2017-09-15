<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;


desc('Install Nginx');
task('ubuntu:install-nginx', function () {
    $result = run('apt-get update && apt-get install nginx-full -y', [
        'timeout' => get('command-timeout', 1800),
    ]);
    writeln('<info>Install Nginx: </info>' . $result);


})->onRoles('app');