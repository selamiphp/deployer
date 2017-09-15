# Deployer Tasks & Recipes

## Requirements
- PHP 7.1+
- [Deployer 5+](https://deployer.org/) 

## Installation 

```bash
composer require selami/deployer-recipes
```

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
  ubuntu:update                Update, upgrade, and autoremove Ubuntu packages 
```

## Usage

1. Init your deployer project


```bash
vendor/bin/dep init
```
2. Add tasks and recipes to your deploy.php created by 'dep init'

```php
<?php

require_once 'deployer_tasks/tasks.php';
require_once 'deployer_recipes/recipes.php';

```
3. Run your command
```bash
vendor/bin/dep ubuntu:private-ip stage/production
```