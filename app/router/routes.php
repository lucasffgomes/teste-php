<?php

/**
 * Arquivo com todas as rotas da aplicação.
 */

return [
    'POST' => [
        // fornecedores
        '/adicionar/fornecedor' => 'Fornecedor@store',
        '/fornecedor/editar/[0-9-]+' => 'Fornecedor@update',
        '/fornecedores/deletar/todos' => 'Fornecedores@destroy',

        // produtos
        '/adicionar/produto' => 'Produto@store',
        '/produto/editar/[0-9-]+' => 'Produto@update',
        '/produtos/deletar/todos' => 'Produtos@destroy'
    ],
    'GET' => [
        '/' => 'Home@index',

        // fornecedores
        '/listar/fornecedores/' => 'Fornecedor@index',
        '/adicionar/fornecedor' => 'Fornecedor@create',
        '/fornecedor/editar/[0-9-]+' => 'Fornecedor@edit',
        '/fornecedor/deletar/[0-9-]+' => 'Fornecedor@destroy',

        // produtos
        '/listar/produtos/' => 'Produto@index',
        '/adicionar/produto' => 'Produto@create',
        '/produto/editar/[0-9-]+' => 'Produto@edit',
        '/produto/deletar/[0-9-]+' => 'Produto@destroy'
    ]
];
