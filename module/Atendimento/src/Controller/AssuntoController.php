<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Atendimento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Atendimento\Form\AssuntoForm;
use Atendimento\Model\Assunto;
use Interop\Container\ContainerInterface;

class AssuntoController extends AbstractActionController
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
        $assuntos = $this->container->get('AssuntoTable')->getAll();
        return new ViewModel([
            'assuntos' => $assuntos
        ]);
    }

    public function gravarAction()
    {
        $assunto = Assunto::getModelFromPost($this->getRequest());
        $this->container->get('AssuntoTable')->save($assunto);
        return $this->redirect()->toRoute('atendimento', [
            'controller' => 'assunto'
        ]);
    }

    public function excluirAction()
    {
        $key = $this->params('key');
        $this->container->get('AssuntoTable')->delete($key);
        return $this->redirect()->toRoute('atendimento', [
            'controller' => 'assunto'
        ]);
    }

    public function editarAction()
    {
        $key = $this->params('key');
        $assunto = $this->container->get('AssuntoTable')->find($key);

        $form = new AssuntoForm();
        $form->setAttribute('action', $this->url()
            ->fromRoute('atendimento', [
            'controller' => 'assunto',
            'action' => 'gravar'
        ]));
        $form->bind($assunto);
        return new ViewModel([
            'form' => $form
        ]);
    }
}
