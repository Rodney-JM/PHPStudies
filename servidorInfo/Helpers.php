<?php

use function PHPSTORM_META\map;

function url(string $URL):string
{
    $server_name = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $ambiente = ($server_name== 'localhost')? URL_DEV: URL_PROD;

    if(!str_starts_with($URL, '/')){
        return $ambiente . '/' . $URL;
    }
    return $ambiente. $URL;
}

function localHost():bool
{
    $server_name = filter_input(INPUT_SERVER, 'SERVER_NAME'); //Pegando o nome do servidor

    if($server_name == 'localhost'){
        return true;
    }

    return false;
}