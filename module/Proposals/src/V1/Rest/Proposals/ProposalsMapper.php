<?php
namespace Proposals\V1\Rest\Proposals;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\TableIdentifier;
use Zend\Paginator\Adapter\DbSelect;

class ProposalsMapper 
{
    protected $db;
    protected $table;

    public function __construct(Adapter $db)
    {
        $this->db = $db;
        $this->table = new TableIdentifier('my_proposals', 'proposals');
    }

    public function fetchAll()
    {
        $select = new Select($this->table);
        $paginatorAdapter = new DbSelect($select, $this->db);
        $collection = new ProposalsCollection($paginatorAdapter);
        return $collection;
    }

    public function fetchOne($id)
    {
        $sql = 'SELECT * FROM proposals.my_proposals WHERE id = ?';
        $resultset = $this->db->query($sql, array($id));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }

        $entity = new ProposalsEntity();
        $entity->populate($data[0]);
        return $entity;
    }

    public function save($data, $id = 0)
    {
        $data = (array)$data;
        $parameters = [
            $data['title'],
            $data['start_date'],
            $data['end_date'],
        ];

        if ($id > 0) {
            $data['id'] = $id;
            array_push($parameters, $id);
        }


        if (isset($data['id'])) 
        {
            $sql = <<<SQL
                UPDATE proposals.my_proposals
                SET title   = ?,
                    start_date      = ?,
                    end_date = ?,
                WHERE id = ?
                SQL;

            $result = $this->db->query($sql, $parameters);
        } 
        else 
        {
            $sql = <<<SQL
                INSERT INTO proposals.my_proposals (title, start_date, end_date)
                VALUES (?, ?, ?)
                SQL;

            $result = $this->db->query($sql, $parameters);
            $data['id'] = $this->db->getDriver()->getLastGeneratedValue();
        }

        return $this->fetchOne($data['id']);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM proposals.my_proposals WHERE id = ?';
        $result = $this->db->query($sql, array($id));
        return $result->getAffectedRows() > 0;
    }
}