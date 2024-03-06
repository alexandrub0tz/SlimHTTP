<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class HomeController{


    function showView(Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    }


}


?>