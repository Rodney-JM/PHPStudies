<?php 

require 'Conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$data_nascimento = $_POST['data_nascimento'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios(email, nome, senha, data_nascimento, endereco)". " VALUES ('{$email}', '{$nome}', '{$senha}', '{$data_nascimento}', '{$endereco}')";

$confCon = Conexao::conectar("./configuracao.ini");
$confCon->exec($sql);

echo "Cadastro realizado com sucesso!";
