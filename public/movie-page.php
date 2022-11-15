<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../data/movies.php';
$title = 'Bitfix';

/**
 * @var array $genres
 * @var array $movies
 */
echo view('layout', [
	'title' => $title,
	'genres' => $genres,
	'content' => view('pages/movie-page', [
		'movies' => $movies,
	]),
]);