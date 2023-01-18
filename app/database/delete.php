<?php

/**
 * Função responsável por contruir a query genérica para DELETAR um registro da tabela. 
 */
function delete(string $table, array $where)
{
    // VERIFICA SE É UM ARRAY ASSOCIATIVO
    if (!arrayIsAssociative(($where))) {
        throw new Exception('O array tem que ser associativo no DELETE.');
    }
    $connect = connect();

    $whereField = array_keys($where);

    // CONSTROI A QUERY
    $sql = "DELETE FROM {$table} WHERE ";
    $sql .= "{$whereField[0]} = :{$whereField[0]}";

    // PREPARA A QUERY
    $prepare = $connect->prepare($sql);

    // EXECUTA A QUERY
    $prepare->execute($where);

    // RETORNA 1 CASO DE CERTO O DELETE NA TABELA
    return $prepare->rowCount();
}
