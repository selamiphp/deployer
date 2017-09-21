<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;

desc('Generate deploy key');
task('project:generate-deploy-key', function () {
    writeln(sprintf('Generating deploy key for:<fg=cyan> %s</>', Context::get()->getHost()->getHostname()));
    run('[ ! -f '.get('deploy-user-home').'/.ssh/id_rsa.pub ]  && ssh-keygen -t rsa -b 4096 -q -f '.get('deploy-user-home').'/.ssh/id_rsa -N "" || echo "File exists"');
    run('chown -R thy:thy '.get('deploy-user-home').'/.ssh/');
    $result = run('more '.get('deploy-user-home').'/.ssh/id_rsa.pub');
    writeln('<info>Generated key: </info>' . $result);
})->onRoles('app');