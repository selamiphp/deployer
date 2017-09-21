<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;

desc('Get deploy key');
task('project:get-deploy-key', function () {
    $result = run('more '.get('deploy-user-home').'/.ssh/id_rsa.pub');
    writeln('<info>Deploy key for </info>'.Context::get()->getHost()->getHostname(). ': ' . $result);
})->onRoles('app');