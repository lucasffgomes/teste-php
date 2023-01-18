<?php

/**
 * Arquivo responsável por conter função de redirecionamento do usuário para outra parte do sistema.
 */

function redirect($to)
{
    return header('Location: ' . $to);
}

function setMessageAndRedirect($index, $message, $redirectTo)
{
    setFlash($index, $message);
    return redirect($redirectTo);
}
