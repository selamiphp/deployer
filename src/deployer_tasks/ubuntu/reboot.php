<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;


desc('Reboot server');
task('ubuntu:reboot', function () {
    run('reboot', [
        'timeout' => get('command-timeout'),
    ]);
    writeln('<info>Rebooting: </info>' . Context::get()->getHost()->getHostname());

})->onRoles('app');