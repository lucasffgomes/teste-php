<?php

/**
 * Função responsável por carregar o controller de uma rota especificada na URI.
 */
function controller($matchedUri, $params)
{
    // PEGAR O CONTROLLER E O METODO DOS VALORES DO ARRAY DE ROTAS PASSADAS DA URI.
    [$controller, $method] = explode('@', array_values($matchedUri)[0]);
    $controllerWithNamespace = 'app\\controllers\\' . $controller;

    // VERIFICA SE O CONTROLLER EXISTE.
    if (!class_exists($controllerWithNamespace)) {
        throw new Exception("O controller {$controller} não existe.");
    }

    // INSTANCIA O CONTROLLER.
    $controllerInstance = new $controllerWithNamespace;

    // VERIFICA SE O METODO EXISTE DENTRO DO CONTROLLER.
    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("O método {$method} não existe no controller {$controller}.");
    }

    $controller = $controllerInstance->$method($params);

    // SE O METODO FOR DO TIPO POST, PARA A EXECUÇAO.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        die();
    }

    return $controller;
}
