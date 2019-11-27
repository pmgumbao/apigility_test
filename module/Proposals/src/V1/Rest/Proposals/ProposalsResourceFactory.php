<?php
namespace Proposals\V1\Rest\Proposals;

use Proposals\V1\Rest\Proposals\ProposalsMapper;

class ProposalsResourceFactory
{
    public function __invoke($services)
    {
        return new ProposalsResource($services->get(ProposalsMapper::class));
    }
}
