<?php
/**
 * @var array $genres
 * @var array $movies
 */
declare(strict_types=1);
require_once  $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';
require_once ROOT . '/public/data/movies.php';

$title = 'Bitfix';

$movieId = $_GET['id'] ?? 1;
$movie = getMovieById($movies, (int)$movieId);

echo view('layout', [
	'title' => $title,
	'genres' => $genres,
	'sidebar_content' => view('components/sidebar-content', [
		'genres' => $genres,
	]),
	'content' => view('pages/movie-page', [
		'movies' => $movie,
	]),
]);