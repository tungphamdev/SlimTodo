# Slim Medoo SQlite

## Install the Application
composer install

## Start the Application
php -S localhost:8080 -t public public/index.php

# APIs
Use postman to test API conviniently.
## Get all todo
method: GET

url: localhost:8080/gettodos

## Insert a todo
method: POST

body: {
	"name": "Something"
}

url: localhost:8080/inserttodo

## Update a todo
method: POST

body: {
	"name": "Something",
	"done": true
}

url: localhost:8080/updatetodo/id

## Delete a todo
method: POST

url: localhost:8080/deletetodo/id