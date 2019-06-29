<?php
namespace Atendimento\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;

class AssuntoForm extends Form
{

    public function __construct($name = null, $options = [])
    {
        parent::__construct('assunto');
        $this->setAttribute('method', 'post');

        $input = new Text('codigo');
        $input->setLabel('ID:');
        $input->setAttribute('size', 11);
        $input->setAttribute('type', 'hidden');
        $this->add($input);

        $input = new Text('assunto');
        $input->setLabel('Assunto:');
        $input->setAttribute('size', 30);

        $this->add($input);

        $input = new Text('detalhes');
        $input->setLabel('Detalhes:');
        $input->setAttribute('size', 200);

        $this->add($input);

        $input = new Submit('gravar');
        $input->setValue('gravar');

        $this->add($input);
    }
}





