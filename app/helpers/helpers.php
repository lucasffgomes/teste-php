<?php

/**
 * Arquivo responsável por conter funções genéricas para uso no sistema em geral.
 */


/**
 * Função responsável por verificar se é um array associativo.
 */
function arrayIsAssociative(array $arr)
{
    return array_keys($arr) != range(0, count($arr) - 1);
}