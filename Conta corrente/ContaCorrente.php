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
        $expressaaMove = 0;
        if($this->saldoDevendo>=0){
            $result = $valor - $this->saldoDevendo;
            if($result>=0){
                $this->chequeEspecial += $this->saldoDevendo;
                $expressaoMove = $this->saldo+=$valor - $this->saldoDevendo;
                $this->saldoDevendo = 0;
            }else{
                $expressaoMove = $this->chequeEspecial += $valor;
                $expressaoMove = $this->saldoDevendo-= $valor;
            }
        }else{
            $expressaaMove = $this->saldo+= $valor;
        }
        $this->inserirMovimentacao($expressaaMove);
        return  $this->saldo;
    }

    public function sacar(float $valor)
    {
        $valor_max = $this->saldo+ $this->chequeEspecial;
        $valorDef = ($valor> $this->saldo)? 'UseCheque': 'NoUseCheque';
        $expressaoMove = 0;

        if($valor> $valor_max){
            echo 'ERROR! Saldo insuficiente';
        }else{
            if($valorDef=='UseCheque'){
                $expressaoMove = $this->chequeEspecial -= $valor-$this->saldo;
                $this->saldo= 0;
            }else if($valorDef=='NoUseCheque'){
                $expressaoMove = $this->saldo-= $valor;
            }
        }
        $this->inserirMovimentacao($expressaoMove);
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
    public function inserirMovimentacao($expressao){
        $dataAgora = date('F j, Y, g:i a');
        $data = '';
        return $this->movimentacoes[] = "{$data} {$expressao} - Titular:{$this->titular}" . PHP_EOL;
    }

    /* public function criarHistoricoArquivo(){
        $arquivoNome = 'historico.txt';
        $arquivoConteudo = $this->movimentacoes;
        fopen($arquivoNome, 'a+');
        file_put_contents($arquivoNome, $arquivoConteudo);
    } */
}