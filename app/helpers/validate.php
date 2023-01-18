<?php

/**
 * Arquivo responsável pelas validaçoes dos inputs do sistema.
 */


/**
 * Função responsável por validar os inputs dos formulários.
 */
function validate(array $validations, bool $persistInputs = false)
{
    $result = [];
    $param = '';
    foreach ($validations as $field => $validate) {

        $result[$field] = (!str_contains($validate, '|')) ?
            singleValidation($validate, $field, $param) :
            multipleValidations($validate, $field, $param);
    }

    if ($persistInputs) {
        setOld();
    }

    if (in_array(false, $result)) {
        return false;
    }

    return $result;
}

/**
 * Função responsável por validar única validação.
 */
function singleValidation($validate, $field, $param)
{
    // VERIFICA SE EXISTE OS DOIS PONTOS NA VALIDAÇÃO (:)
    if (str_contains($validate, ':')) {
        [$validate, $param] = explode(':', $validate);
    }

    return $validate($field, $param);
}


/**
 * Função responsável por validar multiplas validações.
 */
function multipleValidations($validate, $field, $param)
{
    $explodePipeValidate = explode('|', $validate);

    $result = [];
    foreach ($explodePipeValidate as $validate) {
        if (str_contains($validate, ':')) {
            [$validate, $param] = explode(':', $validate);
        }
        $result[$field] = $validate($field, $param);

        if (isset($result[$field]) && $result[$field] == false) {
            break;
        }
    }

    return $result[$field];
}
