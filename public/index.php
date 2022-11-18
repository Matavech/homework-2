<?php

/**
 * @var array $genres
 * @var array $movies
 */

require_once  $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';
require_once ROOT . '/public/data/movies.php';

$title = 'Bitfix';

if (isset($_GET['genre']))
{
	$movies = getMoviesByGenre($_GET['genre'], $movies, $genres);
}

echo view('layout', [
	'title' => $title,
	'sidebar_content' => view('components/sidebar-content', [
		'genres' => $genres,
	]),
	'content' => view('pages/index', [
		'movies' => $movies,
	]),
]);