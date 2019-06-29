<?php
namespace Atendimento\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Email;
use Zend\Form\Element\Number;
use Zend\Form\Element\Submit;

class SolicitanteForm extends Form
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct('solicitante');
        $this->setAttribute('method', 'post');
        
        $input = new Text('cpf');
        $input->setLabel('CPF:');
        $input->setAttribute('size', 11);
        
        $this->add($input);
        
        $input = new Text('nome');
        $input->setLabel('Nome:');
        $input->setAttribute('size', 30);
        
        $this->add($input);
        
        $input = new Text('cep');
        $input->setLabel('CEP:');
        $input->setAttribute('size', 8);
        
        $this->add($input);
        
        $input = new Text('municipio');
        $input->setLabel('Município:');
        $input->setAttribute('size', 80);
        
        $this->add($input);
        
        $input = new Text('uf');
        $input->setLabel('UF:');
        $input->setAttribute('size', 2);
        
        $this->add($input);
        
        $input = new Email('email');
        $input->setLabel('e-mail:');
        $input->setAttribute('size', 255);
        
        $this->add($input);
        
        $input = new Number('ddd');
        $input->setLabel('DDD:');
        $input->setAttribute('size', 2);
        
        $this->add($input);
        
        $input = new Number('telefone');
        $input->setLabel('Telefone:');
        $input->setAttribute('size', 20);
        
        $this->add($input);
        
        $input = new Submit('gravar');
        $input->setValue('gravar');
        
        $this->add($input);
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
}





