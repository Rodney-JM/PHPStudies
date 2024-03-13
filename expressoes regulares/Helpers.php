<?php 

function validarCPF(string $cpf):bool{
    if(mb_strlen($cpf) != 11 or preg_match('/(\d)\1(10)/', $cpf)){//se for repetido numeros, ele retornará false
        return false;
    }

    return true;
}

function limparNumero(string $numero):string
{
    return preg_replace('/^[0-9]/','', $numero);
}