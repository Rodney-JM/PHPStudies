<?php 

/**
 * @param string $data simboliza a data em que o usuario realizou determinada açao
 * @return string retorna a diferença entre o tempo em que o usuario fez determinada ação pro agora
 */
function contarTempo(string $data):string
{
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

    if($segundos<=60){
        return 'agora';
    }elseif($minutos<=60){
        return $minutos==1 ? 'há um minutos': "há {$minutos} minutos";
    }elseif($horas<=24){
        return $horas==1 ? 'há uma hora': "há {$horas} horas";
    }elseif($dias<=7){
        return $dias==1 ? 'há um dia': "há {$dias} dias";
    }elseif($semanas<=4){
        return $semanas==1? 'há uma semana': "há {$semanas} semanas";
    }else if($meses<=12){
        return $meses==1? 'há um mês': "há {$meses} meses";
    }else{
        return $anos==1? 'há um ano': "há {$anos} anos";
    }
}