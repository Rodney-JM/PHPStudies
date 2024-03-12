<?php 

function baixarArquivo(){
    $arquivo = 'C:\\Users\\ssxx2\\OneDrive\\Documentos\\PHPStudies\\Conta corrente\\Conta corrente\\historico.txt';
    $nome_arquivo = 'historico.txt';

    if (file_exists($arquivo)) {
        // Configurações do cabeçalho para forçar o download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $nome_arquivo . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($arquivo));

        // Lê o arquivo e envia
        readfile($arquivo);

        exit;
    } else {
        echo 'Arquivo não encontrado.';
    }
}