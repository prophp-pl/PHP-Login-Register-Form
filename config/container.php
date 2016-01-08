<?php

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Config;

$config = require __DIR__ . '/config.php';

$sm = (new Config(isset($config['dependencies']) ? $config['dependencies'] : []))->configureServiceManager(new ServiceManager);
$sm->setService('config', $config);
return $sm;