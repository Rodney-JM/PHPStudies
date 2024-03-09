<?php 

//Utilizando os filtros do PHP

function validarUrlComFiltro(string $URL):bool
{
    return filter_var($URL, FILTER_VALIDATE_URL);
}

function validarUrl(string $URL):bool
{
    if(mb_strlen($URL)< 10){
        return false;
    }
    if(!str_contains($URL, '.')){//verifica se contem um . na URL
        return false;
    }
    if(str_contains($URL, 'http://') or str_contains($URL, 'https://')){
        return true;
    }

    return false;
}
function validarEmail(string $email):bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
    //Função que pede o email e pode valida-lo
}