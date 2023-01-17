<?php

session_start();
require '../vendor/autoload.php';

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
    if (!file_exists(dirname(__FILE__, 3) . '/app/views/' . $data['view'] . '.php')) {
        throw new Exception("Essa view {$data['view']} não existe.");
    }

    $arr = $templates = new League\Plates\Engine('/app/views/');

    // RENDERIZA O TEMPLATE.
    echo $templates->render($data['view'], $data['data']);
} catch (Exception $e) {
    echo $e->getMessage();
}
