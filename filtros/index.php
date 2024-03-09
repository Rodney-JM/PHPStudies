<?php 

require 'Helpers.php';

if(validarEmail('test')){
    echo 'Endereço de Email válido';
}else{
    echo 'Email inválido';
}

if(validarUrl('http://teste.com')){
    echo 'URL válida';
}else{
    echo 'URL não válida';
}
/* var_dump(validarEmail('rondineypatricio@gmail.com')); //

e