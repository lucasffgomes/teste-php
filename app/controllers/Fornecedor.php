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
                'title' => 'Home',
                'fornecedores' => $fornecedores
            ]
        ];
    }
}
