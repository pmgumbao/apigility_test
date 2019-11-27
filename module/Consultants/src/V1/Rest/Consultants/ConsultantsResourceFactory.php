<?php
namespace Consultants\V1\Rest\Consultants;

use Consultants\V1\Rest\Consultants\ConsultantsMapper;

class ConsultantsResourceFactory
{
    public function __invoke($services)
    {
        return new ConsultantsResource($services->get(ConsultantsMapper::class));
    }
}
