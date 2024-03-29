<?php
namespace Atendimento\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;

class SolicitanteTable
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
     * @param Solicitante $solicitante
     */
    public function save(Solicitante $solicitante)
    {
        $set = $solicitante->toArray();
        $where = [
            'cpf' => $set['cpf']
        ];
        $solicitantes = $this->tableGateway->select($where);
        if ($solicitantes->current() == null) {
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

    public function delete($cpf = '')
    {
        $where = [
            'cpf' => $cpf
        ];
        return $this->tableGateway->delete($where);
    }

    public function find($cpf = '')
    {
        $where = [
            'cpf' => $cpf
        ];
        $solicitantes = $this->tableGateway->select($where);
        $solicitante = $solicitantes->current();
        if ($solicitante == null) {
            $solicitante = new Solicitante();
        }
        return $solicitante;
    }
}

