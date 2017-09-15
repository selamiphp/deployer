<?php
declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;


desc('Get real IP addresses');
task('ubuntu:real-ip', function () {
    $result = run('ifconfig eth0 | grep -m 1 -oE "\b((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b" | head -n1');
    writeln(sprintf('Server:<fg=cyan> %s</> ', Context::get()->getHost()->getHostname()) . ' ' . $result);
});

desc('Get private IP addresses');
task('ubuntu:private-ip', function () {
    $result = run('ifconfig eth1 | grep -m 1 -oE "\b((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b" | head -n1');
    writeln(sprintf('Server:<fg=cyan> %s</> ', Context::get()->getHost()->getHostname()) . ' ' . $result);
});
