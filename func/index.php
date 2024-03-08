<?php 

declare(strict_types = 1); //define forte tipagem
require 'Helpers.php';


echo 'R$' .formatarValor(50);

$text__exemple = 'Ola senhor amsten';
$len__exemple = mb_strlen(trim($text__exemple));//conta os caracteres e remove os whitespaces

echo $resumo = mb_substr($text__exemple, 2, 15);//copia os caracteres

echo $ocorrencia = mb_strpos($text__exemple, 'e'); //a ultima ocorrencia de determinado caractere

echo saudacao();
echo '<br>';
$date = date('j, n, Y');
echo $date;