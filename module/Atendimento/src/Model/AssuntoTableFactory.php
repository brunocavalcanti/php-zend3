<?php
namespace Atendimento\Model;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

class AssuntoTableFactory implements  FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {          
            $adapter = $container->get('DBAdapter');
            $resultSet = new ResultSet();
            $resultSet->setArrayObjectPrototype(new Assunto());
            $tableGateway = new TableGateway('assunto', $adapter, null, $resultSet);
            return new AssuntoTable($tableGateway);
        
    }

}

