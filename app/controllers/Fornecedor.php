<?php

namespace app\controllers;

class Fornecedor
{
    public function index()
    {
        // FORNECEDORES
        read('fornecedor');
        $fornecedores = execute();

        return [
            'view' => 'listar-fornecedores.php',
            'data' => [
                'title' => 'Listar fornecedores - Teste PHP',
                'fornecedores' => $fornecedores
            ]
        ];
    }

    public function create()
    {
        var_dump($_SESSION);

        return [
            'view' => 'adicionar-fornecedor.php',
            'data' => [
                'title' => 'Adicionar fornecedor - Teste PHP',
            ]
        ];
    }

    public function store()
    {
        $validate = validate([
            'nome_vendedor'     => 'required',
            'email_vendedor'    => 'required',
            'cnpj'              => 'required',
            'razao_social'      => 'required',
            'nome_fantasia'     => 'required',
            'telefone'          => 'required',
            'celular_vendedor'  => 'required',
        ], persistInputs: true);

        // SE A VALIDAÇÃO NÃO PASSAR, REDIRECIONA PARA PREENCHER O FORMULÁRIO NOVAMENTE
        if (!$validate) {
            return redirect('/adicionar/fornecedor');
        }

        $created = create('fornecedor', $validate);

        // SE NÃO CADASTROU
        if (!$created) {
            setFlash('message', 'Ocorreu um erro ao cadastrar, tente novamente em instantes.');
            return redirect('/adicionar/fornecedor');
        }

        deleteOld('old');

        return redirect('/listar/fornecedores');
    }
}
