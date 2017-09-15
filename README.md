# Deployer Tasks & Recipes

## Requiremnts
- PHP 7.1+
- [Deployer 5+](https://deployer.org/) 

## Added tasks

```bash
project
  project:fix-rights           Fix permissions
  project:generate-deploy-key  Generate deploy key
  project:get-deploy-key       Get deploy key
 ubuntu
  ubuntu:add-user              Add new user, set authorized_keys as same as root's and set permissions
  ubuntu:install-nginx         Install Nginx
  ubuntu:install-php71         Install php71-fpm and composer using ppa:ondrej/php
  ubuntu:private-ip            Get private IP addresses
  ubuntu:real-ip               Get real IP addresses
  ubuntu:reboot                Reboot server
  ubuntu:service-restart       Restart service. --service input option is required
  ubuntu:update                Updates, upgrades, and autoremoves Ubuntu packages 
```

## Usage

Just include task and recipe files in your *deploy.php*

```php

require_once '/path/to/repository/clone/tasks/tasks.php';
require_once '/path/to/repository/clone/recipes/recipes.php';

```