<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


class AlunniController{

    function showAlunni(Request $request, Response $response, $args) {
        $classe = new Classe();
        $response->getBody()->write($classe->toString());
        return $response->withStatus(200);
    }


    function showAlunno(Request $request, Response $response, $args) {
        $classe = new Classe();
        if($classe->trovaAlunno($args['nome']) == null){
            $response->getBody()->write("Alunno non trovato: " . $args['nome']);
            return $response;
        } else {
            $response->getBody()->write($classe->trovaAlunno($args['nome'])->toString());
            return $response->withStatus(200);
        }
    }


    function apiAlunni(Request $request, Response $response, $args) {
        $classe = new Classe();
        $response->getBody()->write(json_encode($classe));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200); 
    }

    function apiAlunno(Request $request, Response $response, $args) {
        $classe = new Classe();
        $response->getBody()->write(json_encode($classe->trovaAlunno($args['nome'])));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200); 
    }



    function createAlunno(Request $request, Response $response, $args) {
        $body = $request->getBody()->getContents();
        $parsedBody = json_decode($body, true);
        $alunno = new Alunno($parsedBody['nome'], $parsedBody['cognome'], $parsedBody['eta']);
        $response->getBody()->write($alunno->toString());
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201); 
    }


    
    
}


?>