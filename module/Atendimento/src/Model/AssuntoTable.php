<?php
namespace Atendimento\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;

class AssuntoTable
{

    /**
     *
     * @var TableGatewayInterface
     */
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     *
     * @param Assunto $assunto
     */
    public function save(Assunto $assunto)
    {
        $set = $assunto->toArray();
        $where = [
            'codigo' => $set['codigo']
        ];
        $assuntos = $this->tableGateway->select($where);
        if ($assuntos->current() == null) {
            $this->tableGateway->insert($set);
        } else {
            $this->tableGateway->update($set, $where);
        }
    }

    /**
     *
     * @param Where $where
     * @return array
     */
    public function getAll(Where $where = null)
    {
        return $this->tableGateway->select($where);
    }

    public function delete($codigo = '')
    {
        $where = [
            'codigo' => $codigo
        ];
        return $this->tableGateway->delete($where);
    }

    public function find($codigo = '')
    {
        $where = [
            'codigo' => $codigo
        ];
        $assuntos = $this->tableGateway->select($where);
        $assunto = $assuntos->current();
        if ($assunto == null) {
            $assunto = new Assunto();
        }
        return $assunto;
    }
}

