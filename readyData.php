<?php
include('filmData.php');
include('genreData.php');
include('Films.php');
$films = json_decode(file_get_contents('file.txt'), true);
$filmsGenres = json_decode(file_get_contents('file1.txt'), true);
$result1 = $filmsGenres['genres'];
$result = $films['results'];
$filmArray = [];
$genreArray = [];
for ($i = 0; $i < count($result); $i++) {
    array_push($filmArray, new Films($result[$i]['id'], $result[$i]['title'], $result[$i]['original_title'], $result[$i]['poster_path'], $result[$i]['overview'], $result[$i]['release_date'], $result[$i]['genre_ids']));
    $filmArray[$i]->getFilmGenre($result1);
}
















