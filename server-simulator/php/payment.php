<?php

//Pagamento transparente
//1 - Conexão com pagseguro e gerar a sessão
//2 - Iniciar a Biblioteca de javascript do pagseguro, passando o token
//3 - Gerar outro token para enviar para a o servidor com as informações de pagamento


require_once __DIR__ . '/vendor/autoload.php'; // carregaro todas as bibiliotecas instaladas no composer


//CORS
header('Access-Control-Allow-Origin: *');

putenv('PAGSEGURO_EMAIL=argentinaluiz@yahoo.com.br');
putenv('PAGSEGURO_TOKEN_SANDBOX=AAAAAAAAAAAAAAAAAAAAAAAAA');
putenv('PAGSEGURO_ENV=sandbox');


\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName('SON')->setRelease("10.99.99");
\PagSeguro\Library::moduleVersion()->setName('SON')->setRelease("11.0.0");

$sessionCode = PagSeguro\Services\Session::create(
    \PagSeguro\Configuration\Configure::getAccountCredentials()
);

echo json_encode([
   'sessionId' => $sessionCode->getResult(),
]);