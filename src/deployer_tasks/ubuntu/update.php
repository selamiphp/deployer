<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;


desc('Updates, upgrades, and autoremoves Ubuntu packages ');
task('ubuntu:update', function () {
    $result = run('apt-get update && apt-get upgrade -y', [
        'timeout' => get('command-timeout', 1800),
    ]);
    writeln('<info>Update & upgrade packages</info>' . Context::get()->getHost()->getHostname() . ':' . $result);

    $result = run('apt autoremove -y', [
        'timeout' => get('command-timeout', 1800),
    ]);
    writeln('<info>Autoremove packages</info> for' . Context::get()->getHost()->getHostname() . ':' . $result);

})->onRoles('app');