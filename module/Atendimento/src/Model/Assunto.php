<?php
namespace Atendimento\Model;

use Zend\Stdlib\RequestInterface;

class Assunto
{

    private $codigo;

    private $assunto;

    private $detalhes;

    /**
     *
     * @param RequestInterface $request
     */
    public function getFromPost(RequestInterface $request)
    {
        $this->codigo = $request->getPost("codigo");
        $this->assunto = $request->getPost("assunto");
        $this->detalhes = $request->getPost("detalhes");
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     *
     * @param RequestInterface $request
     * @return \Atendimento\Model\Assunto
     */
    public static function getModelFromPost(RequestInterface $request)
    {
        $assunto = new Assunto();
        $assunto->getFromPost($request);
        return $assunto;
    }

    public function exchangeArray($data)
    {
        $this->codigo = $data["codigo"];
        $this->assunto = $data["assunto"];
        $this->detalhes = $data["detalhes"];
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

