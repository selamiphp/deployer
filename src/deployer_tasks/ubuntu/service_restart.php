<?php
declare(strict_types=1);
/**
 i.e.: dep ubuntu:service-restart landing --service=php7.1-fpm
 */


namespace Deployer;

use Deployer\Task\Context;
use Symfony\Component\Console\Input\InputOption;

desc('Restart service. --service input option is required');
option('service', null, InputOption::VALUE_REQUIRED, 'service to be restart.');
task('ubuntu:service-restart', function () {
    run('service ' . input()->getOption('service') . ' restart');
    writeln('Restarting ' . input()->getOption('service') . ' on <info>'. Context::get()->getHost()->getHostname() . '</info>');
});

