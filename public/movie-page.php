<?php
/** @noinspection SuspiciousBinaryOperationInspection */

/**
 * @var array $genres
 * @var array $movies
 */
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';

$title = option('TITLE', 'Bitflix');
$genres = getGenresFromDb();
$movieId = (int)$_GET['id'] ?? 1;
$movie = getMovieById($movieId);

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