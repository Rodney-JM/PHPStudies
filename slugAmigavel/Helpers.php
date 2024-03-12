<?php 

function slug(string $string):string{
    $mapa['a']='ÀÁÃÂ{}_><:;=-()/?\\';

    $mapa['b'] = 'aaaaeeeuuooo';

    $slug = strtr($string, $mapa['a'], $mapa['b']);//transqueve caracteres

    $slug = strip_tags(trim($slug)); //tira as tags html e limpa o texto
    $slug = str_replace(' ', '_', $slug);//troca os espacos por underline
    $slug = str_replace(['_____'], '____','___','__','_','_', $slug);

    return strtolower($slug);
}