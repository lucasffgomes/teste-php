<?php

/**
 * Arquivo responsável por conter funções genéricas para operaçÕes com banco de dados.
 */

$query = [];

// -------------------------
// FUNÇÕES DE QUERY BUILDER
// -------------------------

/**
 * Função responsável por ler.
 */
function read(string $table, string $fields = '*')
{
    global $query;

    $query = [];

    $query['read'] = true;
    $query['table'] = $table;
    $query['execute'] = [];

    $query['sql'] = "SELECT {$fields} FROM {$table}";
}

/**
 * Função responsável por executar qualquer QUERY no banco de dados.
 */
function execute(bool $isFetchAll = true, bool $rowCount = false)
{
    global $query;

    try {
        $connect = connect();

        // VERIFICA SE EXISTE A QUERY FOI MONTADA.
        if (!isset($query['sql'])) {
            throw new Exception('É preciso montar o sql antes de executar a query.');
        }

        $prepare = $connect->prepare($query['sql']);
        $prepare->execute($query['execute'] ?? []);

        if ($rowCount) {
            return $prepare->rowCount();
        }

        return $isFetchAll ? $prepare->fetchAll() : $prepare->fetch();
    } catch (Exception $e) {
        $error = [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'message' => $e->getMessage(),
            'sql' => $query['sql']
        ];
    }
}
