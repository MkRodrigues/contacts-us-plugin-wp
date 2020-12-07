<h1>Mensagens Recebidas</h1>

<?php

if (count($mensagens) > 0) {
    echo "<table border='1'>
    <tr>
        <td>Nome</td>
        <td>Email</td>
        <td>Assunto</td>
        <td>Mensagem</td>
    </tr>";

    foreach ($mensagens as $mensagem) {

        echo "
        <tr>
            <td>{$mensagem->nome}</td>
            <td>{$mensagem->email}</td>
            <td>{$mensagem->assunto}</td>
            <td>{$mensagem->mensagem}</td>
        </tr>
        ";
    }
}
