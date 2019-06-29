<?php
namespace Atendimento\Model;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;

class SolicitanteTableFactory implements  FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {          
            $adapter = $container->get('DBAdapter');
            $tableGateway = new TableGateway('solicitante', $adapter);
            return new SolicitanteTable($tableGateway);
        
    }

}

