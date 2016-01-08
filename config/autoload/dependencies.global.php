<?php

use Zend\Db\Adapter;
use App\Db;

return [

    'dependencies' => [
        'factories' => [
            Adapter\AdapterInterface::class => Adapter\AdapterServiceFactory::class,
            App\Form\RegisterForm::class => App\Form\RegisterFormFactory::class,
            App\Form\LoginForm::class => App\Form\LoginFormFactory::class,
            Db\UserTableGateway::class => Db\UserTableGatewayFactory::class
        ],
    ],
];