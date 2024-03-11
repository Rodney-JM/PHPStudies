<?php 

require 'ContaCorrente.php';

$conta_corrente = new ContaCorrente
('Rodney', 1000, 2000, 500);

$conta_corrente->usarAgiota(6001);
$conta_corrente->gerarExtrato();

echo "<pre>";