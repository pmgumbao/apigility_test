<?php
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'status' => [
                    'adapter' => \ZF\MvcAuth\Authentication\HttpAdapter::class,
                    'options' => [
                        'accept_schemes' => [
                            0 => 'basic',
                        ],
                        'realm' => 'api',
                        'htpasswd' => 'data/users.htpasswd',
                    ],
                ],
                'status_oauth2' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => 'sqlite:data/dbtest.sqlite',
                        'route' => '/oauth',
                        'username' => '',
                        'password' => '',
                    ],
                ],
                'consultants_oauth' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => 'sqlite:data/consultants_oauth.sqlite',
                        'route' => '/consultant_oauth',
                    ],
                ],
            ],
        ],
    ],
    'statuslib' => [
        'array_mapper_path' => 'data/statuslib.php',
    ],
    'zf-oauth2' => [
        'allow_implicit' => true,
    ],
    'db' => [
        'adapters' => [
            'consultants_db' => [
                'database' => 'apigility_consultants',
                'driver' => 'PDO_Mysql',
                'hostname' => 'localhost',
                'username' => 'root',
                'port' => '3306',
            ],
            'proposal_db' => [
                'database' => 'proposals',
                'driver' => 'PDO_Mysql',
                'hostname' => 'localhost',
                'username' => 'root',
                'port' => '3306',
            ],
        ],
    ],
];
