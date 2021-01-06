<?php
/*
Escript CLI para buscar ceps 
Criado por Kevin Souza
*/
if($argc == 1){
    echo "Usage: php {$argv[0]} bairro\n";
    exit();
}

/*
==== Configurações ====
*/
$maximo = '200';
$bairro = urlencode($argv[1]);
$rj = 'RJ';
$localidade = urlencode('Nova Friburgo');

$url = "https://buscacepinter.correios.com.br/app/logradouro_bairro/carrega-logradouro-bairro.php?letraLocalidade=&letraBairro=&cepaux=&pagina=%2Fapp%2Flogradouro_bairro%2Findex.php&mensagem_alerta=&uf=$rj&localidade=$localidade&bairro=$bairro&inicio=1&final=$maximo";

 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);  


$json = json_decode($output);


$str = '';
foreach($json->dados as $local)
{
    global $str;
    $str .= $local->cep.PHP_EOL;
}

//salva o arquivo
file_put_contents($bairro.'_lista_cep.txt',$str);
