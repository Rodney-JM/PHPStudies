<?php 

class ContaCorrente{
    public string $titular;
    private string $data;
    private float $saldo;
    private float $chequeEspecial;
    public float $saldoDevendo;
    public array $movimentacoes= [];

    public function __construct(string $nome, float $saldo, float $chequeEspecial, float $saldoDevedor, $data){
        $this->saldo = $saldo;
        $this->chequeEspecial = $chequeEspecial;
        $this->titular = $nome;
        $this->saldoDevendo = $saldoDevedor;
        $this->data = $data;
    }
    public function depositar(float $valor):float
    {
        $data = $this->data;
        $expressaaMove = 0;
        $val1 = 'x';
        $val2 = 'y';
        $operator = '+';
        if($this->saldoDevendo>=0){
            $result = $valor - $this->saldoDevendo;
            if($result>=0){
                $this->chequeEspecial += $this->saldoDevendo;
                $expressaoMove = $this->saldo+=$valor - $this->saldoDevendo;
                $val1 = 'saldo';
                $val2 = 'deposito';
                $operator = '+';
                $this->saldoDevendo = 0;
            }else{
                $expressaoMove = $this->chequeEspecial += $valor;
                $expressaoMove = $this->saldoDevendo-= $valor;
                $val1 = 'Cheque Especial';
                $val2 = 'deposito';
                $operator = '+';
            }
        }else{
            $expressaaMove = $this->saldo+= $valor;
            $val1 = 'saldo';
            $val2 = 'deposito';
            $operator = '+';
        }
        $this->inserirMovimentacao($this->definirExpressaoMov($val1,$val2,$operator,$expressaoMove), $data);
        return  $this->saldo;
    }

    public function sacar(float $valor)
    {
        $data= $this->data;
        $valor_max = $this->saldo+ $this->chequeEspecial;
        $valorDef = ($valor> $this->saldo)? 'UseCheque': 'NoUseCheque';
        $expressaoMove = 0;
        $operator = '+';
        $val1 = 'x';
        $val2 = 'y';

        if($valor> $valor_max){
            echo 'ERROR! Saldo insuficiente';
        }else{
            if($valorDef=='UseCheque'){
                $expressaoMove = $this->chequeEspecial -= $valor-$this->saldo;
                $operator = '-';
                $val1 = 'cheque Especial';
                $val2 = 'saque';
                $this->saldo= 0;
            }else if($valorDef=='NoUseCheque'){
                $expressaoMove = $this->saldo-= $valor;
                $operator = '-';
                $val1 = 'saldo';
                $val2 = 'saque';
            }
        }
        $this->inserirMovimentacao($this->definirExpressaoMov($val1,$val2,$operator,$expressaoMove), $data);
        return $this->saldo;    
    }

    public function gerarExtrato(){
        echo "<h1>Extrato Atual:</h1>";
        echo "<p>Titular: {$this->titular}<br> Saldo: {$this->saldo}<br>
        Cheque Especial:{$this->chequeEspecial} <br>
        Saldo Devedor: {$this->saldoDevendo}</p>";
    }

   /*  public function gerarHistoricoExtrato(){
        echo '<ul>';
            foreach($this->movimentacoes as $item){
                echo $item;
            }
        echo '</ul>';
    } 
 */
    public function inserirMovimentacao($expressao, $data){
        return $this->movimentacoes[] = "{$this->definirData($data)} {$expressao} - Titular : {$this->titular}" . PHP_EOL;
    }

     public function criarHistoricoArquivo(){
        $arquivoConteudo = '';
        foreach($this->movimentacoes as $mov){
            $arquivoConteudo .= $mov;
        }
        $arquivoNome = 'historico.txt';
        fopen($arquivoNome, 'a+');
        file_put_contents($arquivoNome, $arquivoConteudo);
    } 

    public function usarAgiota(float $valor){
        $saldoAgiota = 6000;
        if($saldoAgiota< $valor){
            echo 'Não possuo esse dinheiro!';
        }else{
            if($this->saldoDevendo>0){
                if($this->saldoDevendo> $valor){
                    $this->saldoDevendo -=$valor;
                    $this->chequeEspecial += $this->saldoDevendo;
                }else{
                    $result = $valor - $this->saldoDevendo;
                    $this->saldo += $result;
                    $this->chequeEspecial+= $this->saldoDevendo;
                    $this->saldoDevendo = 0;
                }
            }else{
                $this->saldo += $valor;
            }
        }

        return $this->saldo;
    }

    public function definirData($data):string{
        $dataAgora = strtotime(date('Y-m-d H:i:s'));//converte str para segundos

        $tempo = strtotime($data);
        $diferencaTempo = $dataAgora - $tempo;

        $segundos = round($diferencaTempo);
        $minutos = round($diferencaTempo/60);
        $horas = round($diferencaTempo/3600);
        $dias = round($diferencaTempo/86400);
        $semanas = round($diferencaTempo/604800);
        $meses = round($diferencaTempo/2592000);
        $anos = round($diferencaTempo/31104000);

        if($segundos<=60){
            return $segundos==1? 'Há um segundo,': "Há {$segundos} segundos,";
        }elseif($minutos<=60){
            return $minutos==1? 'Há um minuto,': "Há {$minutos} minutos,";
        }elseif($horas<=24){
            return $horas==1? 'Há uma hora,': "Há {$horas} horas,";
        }elseif($dias<=7){
            return $dias==1? 'Há um dia,': "Há {$dias} dias,";
        }elseif($semanas<=4){
            return $semanas==1? 'Há uma semana,': "Há {$semanas} semanas,";
        }elseif($meses<=12){
            return $meses==1? 'Há um mês,': "Há {$meses} meses,";
        }else{
            return $anos==1? 'Há um ano,': "Há {$anos} anos,";
        }
    }

    public function definirExpressaoMov($val1, $val2, $operator, $result){
        switch($operator){
            case $operator=='-':
                $operator = 'subtraido';
                break;
            case $operator=='+':
                $operator = 'adicionado';
        }
        return "Foi {$operator} do {$val1} pelo {$val2} resultando em {$result}";
    }
}