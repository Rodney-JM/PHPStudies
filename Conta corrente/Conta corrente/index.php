<?php 

require 'ContaCorrente.php';
require 'config.php';

$conta_corrente = new ContaCorrente
('Rodney', 1000, 2000, 500, '2024-03-11 20:00:0');

$conta_corrente->sacar(300);
$conta_corrente->depositar(300);
$conta_corrente->sacar(300);
$conta_corrente->depositar(300);
$conta_corrente->sacar(300);
$conta_corrente->depositar(300);

$conta_corrente->gerarExtrato();
$conta_corrente->criarHistoricoArquivo();

echo "<pre>";