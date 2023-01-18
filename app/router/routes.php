<?php

/**
 * Arquivo com todas as rotas da aplicação.
 */

return [
    'POST' => [
        '/adicionar/fornecedor' => 'Fornecedor@store',
        '/fornecedor/editar/[0-9-]+' => 'Fornecedor@update'
    ],
    'GET' => [
        '/' => 'Home@index',
        '/listar/fornecedores' => 'Fornecedor@index',
        '/adicionar/fornecedor' => 'Fornecedor@create',
        '/fornecedor/editar/[0-9-]+' => 'Fornecedor@edit',
        '/fornecedor/deletar/[0-9-]+' => 'Fornecedor@destroy'
    ]
];
