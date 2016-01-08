<?php

use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;

defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'development');

chdir(dirname(__DIR__));

// Wczytujemy wcześniej zdefiniowany plik ustawień
require 'phpsettings.php';
require 'vendor/autoload.php';

// Na wszelki wypadek przechwytujemy wszystkie potencjalne wyjątki
try {
    /* @var $container Zend\ServiceManager\ServiceManager */
    $container = require 'config/container.php';
    $request = new Request();
    $paramPage = $request->getQuery('page');

    switch ($paramPage) {
        case 'login':
            /* @var $form \Aura\Input\Form */
            $form = $container->get(App\Form\LoginForm::class);
            if ($request->isGet()) {
                require 'views/login.php';
            } elseif ($request->isPost()) {
                $data = $request->getPost()->toArray();
                $form->fill($data);
                if ($form->filter()) {
                    $userGateway = $container->get(App\Db\UserTableGateway::class);
                    $result = $userGateway->fetchByEmail($request->getPost('email'));
                    if (password_verify($request->getPost('password'), $result['password'])) {
                        echo 'Użytkownik zalogowany prawidłowo.';
                    } else{
                        echo 'Nie udało się zalogować użytkownika.';
                    }
                } else {
                    require 'views/login.php';
                }
            }
            break;
        case 'register':
            /* @var $form \Aura\Input\Form */
            $form = $container->get(App\Form\RegisterForm::class);
            if ($request->isGet()) {
                require 'views/register.php';
            } elseif ($request->isPost()) {
                $data = $request->getPost()->toArray();
                $form->fill($data);
                if ($form->filter()) {
                    $u = new \App\Entity\UserEntity();
                    $u->exchangeArray($data);
                    $userGateway = $container->get(App\Db\UserTableGateway::class);
                    try {
                        $userGateway->insertUser($u);
                        echo 'Użytkownik zarejestrowany prawidłowo.';
                    } catch (Zend\Db\Exception\ExceptionInterface $e) {
                        echo 'Nie udało się zarejestrować użytkownika. Błąd: ', $e->getMessage();
                    }
                } else {
                    require 'views/register.php';
                }
            }
            break;
        default:
            break;
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}