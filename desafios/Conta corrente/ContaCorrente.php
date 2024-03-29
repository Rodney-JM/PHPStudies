<?php 

class ContaCorrente{
    public string $titular;
    private float $saldo;
    private float $chequeEspecial;
    public float $saldoDevendo;
    private array $movimentacoes;

    public function __construct(string $nome, float $saldo, float $chequeEspecial, float $saldoDevedor){
        $this->saldo = $saldo;
        $this->chequeEspecial = $chequeEspecial;
        $this->titular = $nome;
        $this->saldoDevendo = $saldoDevedor;
    }
    public function depositar(float $valor):float
    {
        if($this->saldoDevendo>0){
            $result = $valor - $this->saldoDevendo;
            if($result>0){
                $this->chequeEspecial += $this->saldoDevendo;
                $this->saldoDevendo = 0;
                $this->saldo+=$valor;
                $this->inserirMovimentacao($this->saldo+=$valor);
            }else{
                $this->chequeEspecial += $valor;
                $this->saldoDevendo-= $valor;
                $this->saldo=0;
                $this->inserirMovimentacao($this->chequeEspecial+=$valor);
                $this->inserirMovimentacao($this->saldoDevendo-=$valor);
            }
        }else{
            $this->saldo+= $valor;
            $this->inserirMovimentacao($this->saldo+=$valor);
        }
        return  $this->saldo;
    }

    public function sacar(float $valor)
    {
        $valor_max = $this->saldo+ $this->chequeEspecial;
        $valorDef = ($valor> $this->saldo)? 'UseCheque': 'NoUseCheque';

        if($valor> $valor_max){
            echo 'ERROR! Saldo insuficiente';
        }else{
            if($valorDef=='UseCheque'){
                $this->chequeEspecial -= $valor-$this->saldo;
                $this->saldo= 0;
                $this->inserirMovimentacao($this->chequeEspecial-=$valor-$this->saldo);
            }else if($valorDef=='NoUseCheque'){
                $this->saldo-= $valor;
                $this->inserirMovimentacao( $this->saldo -= $valor);
            }
        }
        return $this->saldo;
    }

    public function gerarExtrato(){
        echo '<ul>';
            foreach($this->movimentacoes as $item){
                echo $item;
            }
        echo '</ul>';
    } 

    public function inserirMovimentacao($expressao){
        $data = date('F j, Y, g:i a');
        return $this->movimentacoes[] = "<li>{$data}<br>{$expressao} - Titular:{$this->titular}</li>";
    }
}