<?php
namespace Proposals\V1\Rest\Proposals;

class ProposalsEntity
{
    
    public $id;
    public $title;
    public $start_date;
    public $end_date;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function populate($data) 
    {
        foreach ($data as $key => $value) 
        {
            $this->{$key} = $value;
        }
    }
}
