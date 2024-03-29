<?php
namespace Atendimento\Model;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

class SolicitanteTableFactory implements  FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {          
            $adapter = $container->get('DBAdapter');
            $resultSet = new ResultSet();
            $resultSet->setArrayObjectPrototype(new Solicitante());
            $tableGateway = new TableGateway('solicitante', $adapter, null, $resultSet);
            return new SolicitanteTable($tableGateway);
        
    }

}

