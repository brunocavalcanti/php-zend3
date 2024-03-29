<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Atendimento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Atendimento\Form\SolicitanteForm;
use Atendimento\Model\Solicitante;
use Interop\Container\ContainerInterface;

class SolicitanteController extends AbstractActionController
{

    /**
     *
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction()
    {
        $solicitantes = $this->container->get('SolicitanteTable')->getAll();
        return new ViewModel([
            'solicitantes' => $solicitantes
        ]);
    }

    public function gravarAction()
    {
        $solicitante = Solicitante::getModelFromPost($this->getRequest());
        $this->container->get('SolicitanteTable')->save($solicitante);
        return $this->redirect()->toRoute('atendimento', [
            'controller' => 'solicitante'
        ]);
    }

    public function excluirAction()
    {
        $key = $this->params('key');
        $this->container->get('SolicitanteTable')->delete($key);
        return $this->redirect()->toRoute('atendimento', [
            'controller' => 'solicitante'
        ]);
    }

    public function editarAction()
    {
        $key = $this->params('key');
        $solicitante = $this->container->get('SolicitanteTable')->find($key);

        $form = new SolicitanteForm();
        $form->setAttribute('action', $this->url()
            ->fromRoute('atendimento', [
            'controller' => 'solicitante',
            'action' => 'gravar'
        ]));
        $form->bind($solicitante);
        return new ViewModel([
            'form' => $form
        ]);
    }
}
