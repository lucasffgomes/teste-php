<?php

/**
 * Função responsável por criar uma query genérica para atualizar um registro da tabela. 
 */
function update(string $table, array $fields, array $where)
{
    // VERIFICANDO SE É UM ARRAY ASSOCIATIVO
    if (!arrayIsAssociative($fields) || !arrayIsAssociative(($where))) {
        throw new Exception('O array tem que ser associativo no update.');
    }
    $connect = connect();

    // CONSTRUÇÃO DA QUERY
    $sql = "UPDATE {$table} SET ";

    foreach (array_keys($fields) as $field) {
        $sql .= "$field = :{$field}, ";
    }

    // RETIRANDO VIRGULA DO FINAL DA QUERY
    $sql = trim($sql, ', ');

    // PEGANDO OS CAMPOS COM VALORES A SEREM ATUALIZADOS NA TABELA
    $whereFields = array_keys($where);

    // CONCATENANDO O FILTRO WHERE COM A QUERY
    $sql .= " WHERE {$whereFields[0]} = :{$whereFields[0]}";

    // ASSOCIANDO OS CAMPOS COM SEUS RESPECTIVOS VALORES
    $data = array_merge($fields, $where);

    // PREPARANDO A QUERY
    $prepare = $connect->prepare($sql);

    // EXECUTANDO A QUERY
    $prepare->execute($data);

    // RETORNANDO 1 CASO DE CERTO O UPDATE NA TABELA
    return $prepare->rowCount();
}
