<?php

header("Content-Type: application/json");
$uploadDir = __DIR__ . "/../uploadedMovies/";
$uuid = uniqid();
var_dump($_FILES);
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$newFileName = $uuid . "." . $extension;
$uploadFile = $uploadDir . basename($newFileName);
echo $uploadFile;

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
    $moviesString = file_get_contents(__DIR__ . "/../database/movies.json");
    $movies = json_decode($moviesString, true);

    $newMovie = json_decode($_POST["movie_data"], true);
    $newMovie["cincenflix_id"] = $newFileName;
    $movies["movies"][] = $newMovie;
    $jsonFile = fopen(__DIR__ . '/../database/movies.json', 'w');
    fwrite($jsonFile, json_encode($movies));
    fclose($jsonFile);
    echo "The file was successfully uploaded";

    // var_dump($_FILES);
} else {
    echo "There was an error uploading the file";
}
