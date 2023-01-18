<?php

/**
 * Função responsável por conectar ao DB e retornar os dados em formato de objeto.
 * Ex: $usuario->nome
 */
function connect()
{
    return new PDO(
        "mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}",
        $_ENV['DATABASE_USER'],
        $_ENV['DATABASE_PASSWORD'],
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
    );
}
