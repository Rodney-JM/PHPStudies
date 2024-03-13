<?php 

require 'Helpers.php';

$cpf = '34565436345';

$limparNumero = preg_replace('/^[0-9]/', '', $cpf); //Tudo que for diferente de 0 a 9, é limpado