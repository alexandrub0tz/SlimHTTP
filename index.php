<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;




require __DIR__ . '/vendor/autoload.php';
include_once 'Classe.php';
include_once 'controllers/HomeController.php';
include_once 'controllers/AlunniController.php';

$app = AppFactory::create();


$app->get('/', 'HomeController:showView');
$app->get('/alunni', 'AlunniController:showAlunni');
$app->get('/alunni/{nome}', 'AlunniController:showAlunno');
$app->get('/api/alunni', 'AlunniController:apiAlunni');
$app->get('/api/alunni/{nome}', 'AlunniController:apiAlunno');
$app->post('/alunni', 'AlunniController:createAlunno');
$app->put('/alunni/{nome}', 'AlunniController:updateAlunno');
$app->delete('/alunni/{nome}', 'AlunniController:deleteAlunno');

$app->run();



/*
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->get('/alunni', function (Request $request, Response $response, $args) {
    $classe = new Classe();
    $response->getBody()->write($classe->toString());
    return $response;
});



$app->get('/alunni/{nome}', function (Request $request, Response $response, $args) {
    $classe = new Classe();

    if($classe->trovaAlunno($args['nome']) == null){
        $response->getBody()->write("Alunno non trovato: " . $args['nome']);
        return $response;
    } else {
        $response->getBody()->write($classe->trovaAlunno($args['nome'])->toString());
        return $response;
    }

});

*/





// $response->withHeader('Content-Type', 'application/json')->withStatus(200)->write('Hello world!');
// json_encode($classe);