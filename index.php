<?php

require_once 'puzzle_data.php';
require_once 'http_request.php';

$puzzleData = new PuzzleData();
$toJsonx = $puzzleData->toJSONx();
$postUrl = "https://cv.microservices.credy.com/v1";
$request = new HTTPRequest();
$response = $request->sendPostRequest($postUrl, $toJsonx);