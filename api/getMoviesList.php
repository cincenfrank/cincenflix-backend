<?php
header("Content-Type: application/json");
$moviesString = file_get_contents(__DIR__ . "/../database/movies.json");
echo $moviesString;
