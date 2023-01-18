<?php

namespace app\controllers;

class Fornecedor
{
    public function index()
    {
        return [
            'view' => 'listar-fornecedores.php',
            'data' => [
                'title' => 'Home',
            ]
        ];
    }
}