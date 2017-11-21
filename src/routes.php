<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes

/*
    Get all todos
*/
$app->get('/gettodos', function (Request $request, Response $response, array $args) {
    // log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $this->database->select('todo', ['id', 'name', 'done']);
    return $response->withJSON($data);
});


/*
    Insert new todo
*/
$app->post('/inserttodo', function (Request $request, Response $response, array $args) {
    // log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $request->getParsedBody();
    $this->database->insert("todo", [
        "name" => $data["name"],
        "done" => "false"
    ]);
});


/*
    Update todo
*/
$app->post('/updatetodo/{id}', function (Request $request, Response $response, array $args) {
    // log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $request->getParsedBody();
    $route = $request->getAttribute('route');
    $todoId = $route->getArgument('id');
    $this->database->update("todo", [
        "name" => $data["name"],
        "done" => $data["done"]
    ], [
        "id" => $todoId
    ]);
});


/*
    Delete todo
*/
$app->post('/deletetodo/{id}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $request->getParsedBody();
    $route = $request->getAttribute('route');
    $todoId = $route->getArgument('id');
    // var_dump($data);
    // $data2 = json_decode($data);
    //return $response->write($data->name);
    $this->database->delete("todo", [
        "id" =>$todoId
    ]);
});