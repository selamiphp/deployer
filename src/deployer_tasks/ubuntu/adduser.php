<?php
declare(strict_types=1);
/**
 This task assumes you have set deploy-user and deploy-user-home parameters in your deploy.php
  i.e.:
        set('deploy-user', 'username');
        set('deploy-user-home', '/home/username')
 */

namespace Deployer;

use Deployer\Task\Context;


desc('Add new user, set authorized_keys as same as root\'s and set permissions');
task('ubuntu:add-user', function () {
    $result = run('adduser '.get('deploy-user').'  -home '.get('deploy-user-home').' -q || true');
    writeln('Adding user <info>'.get('deploy-user').'</info> for <info>'. Context::get()->getHost()->getHostname() . '</info>...' . $result);
    $result = run('mkdir -p '.get('deploy-user-home').'/.ssh');
    writeln('Creating .ssh dir for <info>'. Context::get()->getHost()->getHostname() . '</info>...' . $result);
    $result = run('cp ~/.ssh/authorized_keys '.get('deploy-user-home').'/.ssh/authorized_keys');
    writeln('Copying authorized_keys for <info>'. Context::get()->getHost()->getHostname() . '</info>...' . $result);
    $result = run('chown -R  '.get('deploy-user').':'.get('deploy-user').' '.get('deploy-user-home').'/.ssh');
    writeln('Fixing permissions for <info>'. Context::get()->getHost()->getHostname() . '</info>...' . $result);
})->onRoles('app');