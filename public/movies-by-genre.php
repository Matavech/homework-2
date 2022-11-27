<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';
require_once ROOT . '/public/data/movies.php';


$title = 'Bitfix';

/**
 * @var array $genres
 * @var array $movies
 */
echo view('layout', [
	'title' => $title,
	'genres' => $genres,
	'content' => view('pages/movies-by-genre', [
		'movies' => $movies,
	])
]);
