<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;

desc('Fix permissions');
task('project:fix-rights', function () {
    writeln(sprintf('Fixing permissions for:<fg=cyan> %s</>', Context::get()->getHost()->getHostname()));
    $deployUser = get('deploy-user');
    $deployWebRoot = get('deploy-user-home').'/webroot';
    cd($deployWebRoot);
    run('chown -R '.$deployUser.':'.$deployUser.' *');
    run('mkdir -p cache');
    run('mkdir -p logs');
    run('chown -R www-data:www-data cache');
    run('chown -R www-data:www-data logs');
    writeln('Folder permissions fixed');
})->onRoles('app');