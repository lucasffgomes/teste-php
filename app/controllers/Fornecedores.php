<?php

namespace app\controllers;

class Fornecedores
{
    public function destroy()
    {
        foreach(array_keys($_POST) as $itemId){
            $deleted = delete('fornecedor',['id_fornecedor' => $itemId]);
        }

        if (!$deleted) {
            setFlash('message', 'Ocorreu um erro ao deletar, tente novamente em breve');
            return redirect('/listar/fornecedores');
        }

        return redirect('/listar/fornecedores');
    }
}
