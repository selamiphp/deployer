<?php
declare(strict_types=1);

namespace Deployer;

$generalFiles = glob(__DIR__ . '/*.php');
$projectFiles = glob(__DIR__ . '/project/*.php');
$ubuntuFiles = glob(__DIR__ . '/ubuntu/*.php');

$files = array_merge($generalFiles, $projectFiles, $ubuntuFiles);
foreach ($files as $file) {
    if (strpos($file, 'base.php') === false) {
        require_once $file;
    }
}