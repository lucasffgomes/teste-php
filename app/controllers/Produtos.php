<?php

namespace app\controllers;

class Produtos
{
    public function destroy()
    {
        foreach(array_keys($_POST) as $itemId){
            $deleted = delete('produto',['id_produto' => $itemId]);
        }

        if (!$deleted) {
            setFlash('message', 'Ocorreu um erro ao deletar, tente novamente em breve');
            return redirect('/listar/produtos/');
        }

        return redirect('/listar/produtos/');
    }
}
