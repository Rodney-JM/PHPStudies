<?php 

class Mensagem{
    private $texto; //Atribute
    public $css;
    
    public function redenrizar():string{
        return $this->texto = 'mensagem de teste';
    }

    private function filtrar(string $mensagem):string{
        return filter_var($mensagem, FILTER_DEFAULT);
    }
}
