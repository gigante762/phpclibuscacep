# phpclibuscacep
Um programa CLI em php que busca por ceps

### Pra que serve
Use o programa para gerar facilmelmente um .txt com todos os ceps possíveis de um encereço.
### Como usar
`$ php buscacep.php bairro`

------
Mude as configurações em 

	$maximo = '200';  //maximo de registros que virão
	$bairro = urlencode($argv[1]);
	$rj = 'RJ'; 
	$localidade = urlencode('Nova Friburgo');  
