<?php
/**
 * Arquivo responsável por conter todas as validações do sistema.
 */

 /**
 * Função responsável por definir como input obrigatório.
 */
function required($field)
{
    if ($_POST[$field] === '') {
        setFlash($field, 'O campo é obrigatório.');
        return false;
    }

    return strip_tags($_POST[$field]);
}

/**
 * Função responsável por validar o input que tenha como validação do tipo email
 */
function email($field)
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid) {
        setFlash($field, 'Insira um email válido.');
        return false;
    }

    return strip_tags($_POST[$field]);
}

/**
 * Função responsável limitar o tamnho de caracteres a ser inserido.
 */
function maxlen($field, $param)
{
    $data = strip_tags($_POST[$field]);

    if (strlen($data) > $param) {
        setFlash($field, "Esse campo não pode ter mais que {$param} caracteres.");
        return false;
    }

    return $data;
}
