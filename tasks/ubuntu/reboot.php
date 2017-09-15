<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;


desc('Reboot server');
task('ubuntu:reboot', function () {
    $result = run('reboot', [
        'timeout' => get('command-timeout'),
    ]);
    writeln('<info>Rebooting: </info>' . Context::get()->getHost()->getHostname() . $result);

})->onRoles('app');