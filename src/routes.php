<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes

$app->get('/gettodos', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $this->database->select('todo', ['id', 'name', 'done']);
    // Render index view
    // return $this->renderer->render($response, 'index.phtml', $args);
    return $response->withJSON($data);
});

$app->post('/inserttodo', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $request->getParsedBody();

    // var_dump($data["name"]);
    // $data2 = json_decode($data);
    //return $response->write($data->name);
    $this->database->insert("todo", [
        "name" => $data["name"],
        "done" => "false"
    ]);
});

$app->post('/updatetodo', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $request->getParsedBody();

    // var_dump($data["name"]);
    // $data2 = json_decode($data);
    //return $response->write($data->name);
    $this->database->insert("todo", [
        "name" => $data["name"],
        "done" => "false"
    ]);
});