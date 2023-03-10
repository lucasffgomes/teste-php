<?php

session_start();
require '../vendor/autoload.php';

// LEITURA DAS VARIAVEIS DE AMBIENTE
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__,2));
$dotenv->load();

try {
    $data = router();

    // VERIFICA SE O INDICE DATA ESTÁ SETADO.
    if (!isset($data['data'])) {
        throw new Exception('O índice DATA está faltando.');
    }

    // VERIFICA SE O TITULO DA PAGINA ESTÁ CONFIGURADO.
    if (!isset($data['data']['title'])) {
        throw new Exception('O índice TITLE está faltando.');
    }

    // VERIFICA SE O INDICE VIEW EXISTE.
    if (!isset($data['view'])) {
        throw new Exception('O índice VIEW está faltando.');
    }

    // VERIFICA SE O ARQUIVO VIEW EXISTE.
    if (!file_exists(VIEWS . $data['view'])) {
        throw new Exception("Essa view {$data['view']} não existe.");
    }

    extract($data['data']);
    $view = $data['view'];
    require VIEWS . 'master.php';
} catch (Exception $e) {
    echo $e->getMessage();
}
