<?php

/**
 * Arquivo responsável por conter funções genéricas para operaçÕes com banco de dados.
 */

use Doctrine\Inflector\InflectorFactory;

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

function paginate(string|int $perPage = 10)
{
    global $query;

    if (isset($query['limit'])) {
        throw new Exception('A paginação não poser ser chamada com o limite.');
    }

    // CONTABILIZA A QUANTIDADE DE REGISTROS
    $rowCount = execute(rowCount: true);

    // PEGA A PAGINA DA QUERY STRING DA URL
    $page = strip_tags($_GET['page']);

    $page = $page ?? 1;

    $query['currentPage'] = (int) $page;
    $query['pageCount'] = (int) ceil($rowCount / $perPage);
    $offset = ($page - 1) * $perPage;

    $query['paginate'] = true;

    $query['sql'] = "{$query['sql']} LIMIT {$perPage} OFFSET {$offset}";
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

function fieldFK(string $table, string $field)
{
    $inflector = InflectorFactory::create()->build();
    $tableToSingular = $inflector->singularize($table);

    return $tableToSingular . ucfirst($field);
}

function tableJoin(string $table, string $fieldFK, string $typeJoin = 'INNER')
{
    global $query;

    if (isset($query['where'])) {
        throw new Exception('Não pode colocar o WHERE antes do JOIN');
    }

    $fkToJoin = fieldFK($query['table'], $fieldFK);
    $query['sql'] = "{$query['sql']} {$typeJoin} JOIN {$table} ON {$table}.{$fkToJoin} = {$query['table']}.{$fieldFK}";
}

function tableJoinWithFK(string $table, string $fieldFK, string $typeJoin = 'INNER')
{
    global $query;

    if (isset($query['where'])) {
        throw new Exception('Não pode colocar o WHERE antes do JOIN');
    }

    $fkToJoin = fieldFK($table, $fieldFK);
    $query['sql'] = "{$query['sql']} {$typeJoin} JOIN {$table} ON {$table}.{$fieldFK} = {$query['table']}.{$fieldFK}";
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
