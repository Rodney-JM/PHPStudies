<?php 

class Conexao
{
    public static function conectar($cam)
    {
        $configuracao = parse_ini_file($cam);

        $dns = "mysql:host={$configuracao['host']};dbname={$configuracao['dbname']}";
        $pdo = new PDO($dns, $configuracao['user'], $configuracao['password']);

        return $pdo;
    }
}