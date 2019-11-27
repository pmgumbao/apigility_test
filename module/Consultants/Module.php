<?php
namespace Consultants;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Consultants\V1\Rest\Consultants\ConsultantsMapper;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                ConsultantsMapper::class =>  function ($sm) {
                    $adapter = $sm->get('consultants_db');
                    return new ConsultantsMapper($adapter);
                },
            ),
        );
    }
}
