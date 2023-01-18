<?php

/**
 * Função responsável por construir uma query genérica para cadastro de algo no banco.
 */
function create(string $table, array $data)
{
    try {
        // VERIFICA SE É UM ARRAY ASSOCIATIVO
        if (!arrayIsAssociative($data)) {
            throw new Exception('O array tem que ser associativo.');
        }
        $connect = connect();

        // CONSTROI A QUERY
        $sql = "INSERT INTO {$table} (";
        $sql .= implode(',', array_keys($data)) . ") VALUES (";
        $sql .= ':' . implode(',:', array_keys($data)) . ")";

        // PREPARA A QUERY
        $prepare = $connect->prepare($sql);

        // EXECUTA A QUERY
        return $prepare->execute($data);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}
