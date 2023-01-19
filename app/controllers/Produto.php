<?php

namespace app\controllers;

class Produto
{
    public function index()
    {
        // PRODUTOS
        read('produto', 'id_produto,nome_produto,valor_produto,nome_produto,peso,quantidade_estoque,nome_fantasia,telefone');
        tableJoinWithFK('fornecedor','id_fornecedor');
        $produtos = execute();

        return [
            'view' => 'listar-produtos.php',
            'data' => [
                'title' => 'Listar produtos - Teste PHP',
                'produtos' => $produtos
            ]
        ];
    }

    public function create()
    {
        // CARREGANDO IDs DOS FORNECEDORES
        read('fornecedor', 'id_fornecedor,nome_fantasia');
        $fornecedores = execute();

        return [
            'view' => 'adicionar-produto.php',
            'data' => [
                'title' => 'Adicionar produto - Teste PHP',
                'fornecedores' => $fornecedores
            ]
        ];
    }

    public function store()
    {
        $validate = validate([
            'nome_produto'          => 'required',
            'valor_produto'         => 'required',
            'peso'                  => 'required',
            'quantidade_estoque'    => 'required',
            'id_fornecedor'         => 'required'
        ], persistInputs: true);

        // SE A VALIDAÇÃO NÃO PASSAR, REDIRECIONA PARA PREENCHER O FORMULÁRIO NOVAMENTE
        if (!$validate) {
            return redirect('/adicionar/produto');
        }

        $created = create('produto', $validate);

        // SE NÃO CADASTROU
        if (!$created) {
            setFlash('message', 'Ocorreu um erro ao cadastrar, tente novamente em instantes.');
            return redirect('/adicionar/produto');
        }

        deleteOld('old');

        return redirect('/listar/produtos');
    }

    public function edit($params)
    {
        read('produto');
        where('id_produto', $params['editar']);
        $produto = execute();

        return [
            'view' => 'editar-produto.php',
            'data' => [
                'title' => 'Editar produto - Teste PHP',
                'produto' => $produto
            ]
        ];
    }

    public function update($params)
    {
        $validate = validate([
            'nome_produto'          => 'required',
            'valor_produto'         => 'required',
            'peso'                  => 'required',
            'quantidade_estoque'    => 'required',
            'id_fornecedor'         => 'required'
        ], persistInputs: true);

        if (!$validate) {
            return redirect('/produto/editar' . $params['editar']);
        }

        $updated = update('produto', $validate, ['id_produto' => $params['editar']]);

        if (!$updated) {
            setFlash('message', 'Ocorreu um erro ao editar, tente novamente em breve');
            return redirect('/produto/editar' . $params['editar']);
        }

        return redirect('/listar/produtos');
    }

    public function destroy($params)
    {
        $deleted = delete('produto', ['id_produto' => $params['deletar']]);

        if (!$deleted) {
            setFlash('message', 'Ocorreu um erro ao deletar, tente novamente em breve');
            return redirect('/listar/produtos');
        }

        return redirect('/listar/produtos');
    }
}
