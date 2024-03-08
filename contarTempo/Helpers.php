<?php 

function contarTempo(string $data){
    $dataAgora = strtotime(date('Y-m-d H:i:s')); //converte a str para segundos

    $tempo = strtotime($data);//data que ira ser recebida
    $diferencaTempo = $dataAgora - $tempo;

    $segundos = $diferencaTempo;
    $minutos = round($diferencaTempo/60);//Arredonda determinado numero
    $horas = round($diferencaTempo/3600);
    $dias = round($diferencaTempo/86400);
    $semanas = round($diferencaTempo/604800);
    $meses = round($diferencaTempo/2592000);
    $anos = round($diferencaTempo/31104000);
}