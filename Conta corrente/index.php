<?php 

require 'ContaCorrente.php';

$conta_corrente = new ContaCorrente
('Rodney', 1000, 2000, 500);

$conta_corrente->depositar(400);
$conta_corrente->gerarExtrato();
/* $conta_corrente->criarHistoricoArquivo(); */

echo "<pre>";