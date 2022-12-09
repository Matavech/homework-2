<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';

$genres = getGenresFromDb();
$movies = getMoviesFromDb($_GET['genre']);
$title = option('TITLE', 'Bitflix');

/**
 * @var array $genres
 * @var array $movies
 */
echo view('layout', [
	'title' => $title,
	'genres' => $genres,
	'content' => view('pages/movies-by-genre', [
		'movies' => $movies,
	]),
]);
