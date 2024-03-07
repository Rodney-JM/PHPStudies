<?php 

require 'ContaCorrente.php';

$conta_corrente = new ContaCorrente('Rodney', 10000, 200, 100);
$conta_corrente->depositar(200);
$conta_corrente->sacar(1000);
$conta_corrente->gerarExtrato();
$conta_corrente->criarHistoricoArquivo();

echo "<pre>";
print_r($conta_corrente);