<?php

header('Content-type: application/json');

// Conexão com Banco de Dados
require_once 'dbConnect.php';

// Definir UTF8 para a conexão

mysqli_set_charset($conn, $charset);

$response = array();

$stmt = mysqli_prepare($conn, "SELECT id, sigla, nome FROM estado");


mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt,
        $id,
        $sigla,
        $nome);

// Apresentando os Dados da consulta
//var_dump($stmt);


if (mysqli_stmt_num_rows($stmt) > 0) {

    while (mysqli_stmt_fetch($stmt)) {
        array_push($response, array("id" => $id,
            "sigla" => $sigla,
            "nome" => $nome));
    }
    echo json_encode($response);
} else {

    echo json_encode($response);
}
?>
