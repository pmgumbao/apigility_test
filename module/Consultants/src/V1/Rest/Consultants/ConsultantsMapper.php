<?php
namespace Consultants\V1\Rest\Consultants;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\TableIdentifier;
use Zend\Paginator\Adapter\DbSelect;

class ConsultantsMapper 
{
    protected $db;
    protected $table;

    public function __construct(Adapter $db)
    {
        $this->db = $db;
        $this->table = new TableIdentifier('consultants', 'apigility_consultants');
    }

    public function fetchAll()
    {
        $select = new Select($this->table);
        $paginatorAdapter = new DbSelect($select, $this->db);
        $collection = new ConsultantsCollection($paginatorAdapter);
        return $collection;
    }

    public function fetchOne($id)
    {
        $sql = 'SELECT * FROM apigility_consultants.consultants WHERE id = ?';
        $resultset = $this->db->query($sql, array($id));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }

        $entity = new ConsultantsEntity();
        $entity->populate($data[0]);
        return $entity;
    }

    public function save($data, $id = 0)
    {
        $data = (array)$data;
        $parameters = [
            $data['name'],
            $data['age'],
            $data['address'],
        ];

        if ($id > 0) {
            $data['id'] = $id;
            array_push($parameters, $id);
        }


        if (isset($data['id'])) 
        {
            $sql = <<<SQL
                UPDATE apigility_consultants.consultants
                SET name   = ?,
                    age      = ?,
                    address = ?,
                WHERE id = ?
                SQL;

            $result = $this->db->query($sql, $parameters);
        } 
        else 
        {
            $sql = <<<SQL
                INSERT INTO apigility_consultants.consultants (name, age, address)
                VALUES (?, ?, ?)
                SQL;

            $result = $this->db->query($sql, $parameters);
            $data['id'] = $this->db->getDriver()->getLastGeneratedValue();
        }

        return $this->fetchOne($data['id']);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM apigility_consultants.consultants WHERE id = ?';
        $result = $this->db->query($sql, array($id));
        return $result->getAffectedRows() > 0;
    }
}