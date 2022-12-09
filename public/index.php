<?php

/**
 * @var array $genres
 * @var array $movies
 */

require_once __DIR__ . '/../boot.php';

$title = option('TITLE', 'Bitlflix');
$genres = getGenresFromDb();
$movies = getMoviesFromDb($_GET['genre']);

echo view('layout', [
	'title' => $title,
	'sidebar_content' => view('components/sidebar-content', [
		'genres' => $genres,
	]),
	'content' => view('pages/index', [
		'movies' => $movies,
	]),
]);