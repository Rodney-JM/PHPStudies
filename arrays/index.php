<?php 

require 'Helpers.php';

/* var_dump(filter_input(INPUT_SERVER, 'SERVER_NAME')); */

$meses = ['Janeiro', 'Fevereiro', 'Março'];

$mesesChaveado = [
    'j'=>'Janeiro',
    'f'=>'Fevereiro',
    'm'=>'Março'
];

echo $meses['Janeiro'];
echo $mesesChaveado['j'];

foreach($meses as $chave => $mes){
    echo $mes . '<br>';
}

var_dump($_SERVER);
echo $_SERVER['CONTEXT_PREFIX'];