<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/articles', function (Request $request, Response $response, array $args) {

    /**
     * @var PDO $db
     */
    $db = $this->db;

    $stmt = $db->prepare("SELECT * FROM articles");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $response->withJson($result, 200, JSON_PRETTY_PRINT);
});


$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withJson(["healthy" => true], 200, JSON_PRETTY_PRINT);
});
