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
if (file_exists('./images/') == true) {
    foreach (glob('./pictures/*') as $document) {
        unlink($document);
    }
}
for ($i = 0; $i < count($filmArray); $i++) {
    if (!file_exists("./images/img" . $i . ".jpg") == true) {
        $pictures = file_get_contents('https://image.tmdb.org/t/p/w400' . $filmArray[$i]->poster);
        file_put_contents("./pictures/img" . $i . ".jpg", $pictures);
    }
}
include('form.php');











