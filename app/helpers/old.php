<?php

/**
 * Arquivo responsável por conter funcionalidades de persistir valores nos inputs dos formulários ao validação falhar.
 */

function setOld()
{
    $_SESSION['old'] = $_POST ?? [];
}

function getOld($index)
{
    if (isset($_SESSION['old'][$index])) {
        $old = $_SESSION['old'][$index];
        unset($_SESSION['old'][$index]);

        return $old ?? '';
    }
}
