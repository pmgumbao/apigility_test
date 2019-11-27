<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
            'consultants_db' => [],
            'proposal_db' => [],
        ],
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'map' => [
                'Status\\V1' => 'status_oauth2',
                'Consultants\\V1' => 'consultants_oauth',
                'Proposals\\V1' => 'consultants_oauth',
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/consultant_oauth|/oauth2|/oauth))',
                ],
                'type' => 'regex',
            ],
        ],
    ],
];
