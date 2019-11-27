<?php
return [
    'service_manager' => [
        'factories' => [
            \Proposals\V1\Rest\Proposals\ProposalsResource::class => \Proposals\V1\Rest\Proposals\ProposalsResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'proposals.rest.proposals' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/v1/proposals[/:proposals_id]',
                    'defaults' => [
                        'controller' => 'Proposals\\V1\\Rest\\Proposals\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'proposals.rest.proposals',
        ],
    ],
    'zf-rest' => [
        'Proposals\\V1\\Rest\\Proposals\\Controller' => [
            'listener' => \Proposals\V1\Rest\Proposals\ProposalsResource::class,
            'route_name' => 'proposals.rest.proposals',
            'route_identifier_name' => 'proposals_id',
            'collection_name' => 'proposals',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Proposals\V1\Rest\Proposals\ProposalsEntity::class,
            'collection_class' => \Proposals\V1\Rest\Proposals\ProposalsCollection::class,
            'service_name' => 'proposals',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Proposals\\V1\\Rest\\Proposals\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Proposals\\V1\\Rest\\Proposals\\Controller' => [
                0 => 'application/vnd.proposals.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Proposals\\V1\\Rest\\Proposals\\Controller' => [
                0 => 'application/vnd.proposals.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Proposals\V1\Rest\Proposals\ProposalsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'proposals.rest.proposals',
                'route_identifier_name' => 'proposals_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Proposals\V1\Rest\Proposals\ProposalsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'proposals.rest.proposals',
                'route_identifier_name' => 'proposals_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Proposals\\V1\\Rest\\Proposals\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Proposals\\V1\\Rest\\Proposals\\Controller' => [
            'input_filter' => 'Proposals\\V1\\Rest\\Proposals\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Proposals\\V1\\Rest\\Proposals\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'title',
                'description' => 'Proposal Title',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'start_date',
                'description' => 'Start Date',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'end_date',
                'description' => 'End Date',
            ],
        ],
    ],
];
