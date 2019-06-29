<?php
namespace Atendimento\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

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
        $this->tableGateway->insert($set);
    }
}

