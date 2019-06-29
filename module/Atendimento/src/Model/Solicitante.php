<?php
namespace Atendimento\Model;

use Zend\Stdlib\RequestInterface;

class Solicitante
{

    private $cpf;

    private $nome;

    private $cep;

    private $municipio;

    private $uf;

    private $email;

    private $ddd;

    private $telefone;

    /**
     *
     * @param RequestInterface $request
     */
    public function getFromPost(RequestInterface $request)
    {
        $this->cpf = $request->getPost("cpf");
        $this->nome = $request->getPost("nome");
        $this->cep = $request->getPost("cep");
        $this->municipio = $request->getPost("municipio");
        $this->uf = $request->getPost("uf");
        $this->email = $request->getPost("email");
        $this->ddd = $request->getPost("ddd");
        $this->telefone = $request->getPost("telefone");
    }

    /**
     *
     * @param RequestInterface $request
     * @return \Atendimento\Model\Solicitante
     */
    public static function getModelFromPost(RequestInterface $request)
    {
        $solicitante = new Solicitante();
        $solicitante->getFromPost($request);
        return $solicitante;
    }

    /**
     *
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    public function exchangeArray($data)
    {
        $this->cpf = $data["cpf"];
        $this->nome = $data["nome"];
        $this->cep = $data["CEP"];
        $this->municipio = $data["municipio"];
        $this->uf = $data["UF"];
        $this->email = $data["email"];
        $this->ddd = $data["ddd"];
        $this->telefone = $data["telefone"];
    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}

