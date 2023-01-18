<?php

/**
 * Arquivo responsável configurar as flash messages da aplicação.
 */


/**
 * Função responsável por atribuir uma mensagem no sessão atual.
 */
function setFlash($index, $message)
{
    if (!isset($_SESSION['flash'][$index])) {
        $_SESSION['flash'][$index] = $message;
    }
}

/**
 * Função responsável por capturar a mensagem quando é chamada nas views.
 */
function getFlash($index, $style = 'color:orange')
{
    if(isset($_SESSION['flash'][$index])){
        $flash = $_SESSION['flash'][$index];
        unset($_SESSION['flash'][$index]);

        return "<span style='$style'>{$flash}</span>";
    }
}