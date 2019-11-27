<?php
return [
    'service_manager' => [
        'factories' => [
            \Consultants\V1\Rest\Consultants\ConsultantsResource::class => \Consultants\V1\Rest\Consultants\ConsultantsResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'consultants.rest.consultants' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/consultants[/:consultants_id]',
                    'defaults' => [
                        'controller' => 'Consultants\\V1\\Rest\\Consultants\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'consultants.rest.consultants',
        ],
    ],
    'zf-rest' => [
        'Consultants\\V1\\Rest\\Consultants\\Controller' => [
            'listener' => \Consultants\V1\Rest\Consultants\ConsultantsResource::class,
            'route_name' => 'consultants.rest.consultants',
            'route_identifier_name' => 'consultants_id',
            'collection_name' => 'consultants',
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
            'entity_class' => \Consultants\V1\Rest\Consultants\ConsultantsEntity::class,
            'collection_class' => \Consultants\V1\Rest\Consultants\ConsultantsCollection::class,
            'service_name' => 'Consultants',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Consultants\\V1\\Rest\\Consultants\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Consultants\\V1\\Rest\\Consultants\\Controller' => [
                0 => 'application/vnd.consultants.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Consultants\\V1\\Rest\\Consultants\\Controller' => [
                0 => 'application/vnd.consultants.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Consultants\V1\Rest\Consultants\ConsultantsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            \Consultants\V1\Rest\Consultants\ConsultantsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'is_collection' => true,
            ],
            'Consultants\\Entity' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            'Consultants\\Collection' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'is_collection' => true,
            ],
            \StatusLib\Entity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            \StatusLib\Collection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'is_collection' => true,
            ],
            'ConsultantsLib\\Entity' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            'ConsultantsLib\\Collection' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'consultants.rest.consultants',
                'route_identifier_name' => 'consultants_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Consultants\\V1\\Rest\\Consultants\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Consultants\\V1\\Rest\\Consultants\\Controller' => [
            'input_filter' => 'Consultants\\V1\\Rest\\Consultants\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Consultants\\V1\\Rest\\Consultants\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
                'description' => 'Name',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'age',
                'description' => 'Age',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'address',
                'description' => 'Address',
            ],
        ],
    ],
];
