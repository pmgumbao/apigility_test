<?php
namespace Consultants\V1\Rest\Consultants;

class ConsultantsEntity
{
    public $id;
    public $name;
    public $age;
    public $address;

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
