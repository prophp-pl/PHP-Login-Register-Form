<?php
namespace App\Form;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Aura\Input\Builder;
use Aura\Input\Filter;

class LoginFormFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $form = new LoginForm(new Builder, new Filter);
        return $form;
    }
}