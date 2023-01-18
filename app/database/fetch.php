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
 * Função responsável por filtrar registros retornados de uma consulta ao banco.
 */
function where()
{
    global $query;

    if (isset($query['where'])) {
        throw new Exception('Verifique quantos WHEREs estão sendo chamados ao criar a query');
    }

    $args = func_get_args();
    $numArgs = func_num_args();

    // VERIFICA SE O READ() ESTÁ SENDO CHAMADO
    if (!isset($query['read'])) {
        throw new Exception('Antes de chamar o where() chame o read().');
    }

    // VERIFICA SE A QUANTIDADE DE ARGUMENTOS PASSADOS É MENOR QUE 2 OU MAIOR QUE 3
    if ($numArgs < 2 || $numArgs > 3) {
        throw new Exception('O where() precisa de 2 ou 3 parâmetros.');
    }

    if ($numArgs === 2) {
        $field = $args[0];
        $operator = '=';
        $value = $args[1];
    }

    if ($numArgs === 3) {
        $field = $args[0];
        $operator = $args[1];
        $value = $args[2];
    }

    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = "{$query['sql']} WHERE {$field} {$operator} :{$field}";
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
