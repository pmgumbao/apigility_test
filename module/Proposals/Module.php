<?php
namespace Proposals;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Proposals\V1\Rest\Proposals\ProposalsMapper;

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
                ProposalsMapper::class =>  function ($sm) {
                    $adapter = $sm->get('proposal_db');
                    return new ProposalsMapper($adapter);
                },
            ),
        );
    }
}
