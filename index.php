<?php

declare(strict_types = 1);

ini_set("display_errors", "On");

require __DIR__ . "/vendor/autoload.php";

set_exception_handler("ErrorHandler::handleException");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parts = explode("/", $path);

$resources = $parts[2];

$id = $parts[3] ?? null;

$method = $_SERVER['REQUEST_METHOD'];

if($resources != "tasks"){
    http_response_code(404);
    exit;
}

header("Content-Type: application/json; charset=UTF-8");

$controller = new TaskController();

$controller->processRequest($method, $id);

/* echo 'test'; */

/* PROVA 2 */