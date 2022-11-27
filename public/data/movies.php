<?php

$genresQuery = '
SELECT CODE, NAME FROM genre
';
$result = getDbResultByQuery($genresQuery);
while ($row = mysqli_fetch_assoc($result))
{
	$genres[$row['CODE']] = $row['NAME'];
}

$moviesQuery = '
	SELECT * FROM movie
';
$movieGenresQuery = '
	SELECT MOVIE_ID, NAME FROM movie_genre inner join genre g on movie_genre.GENRE_ID = g.ID
';
$movieActorsQuery = '
	SELECT MOVIE_ID, NAME FROM movie_actor inner join actor a on movie_actor.ACTOR_ID = a.ID
';
$movieDirectorsQuery = '
	SELECT m.ID, NAME FROM director inner join movie m on director.ID = m.DIRECTOR_ID
';

// @todo придумать, куда положить эту функцию
function fillArrayByDbQuery(array $array, string $query) : array{
	$result = getDbResultByQuery($query);
	while ($row = mysqli_fetch_assoc($result))
	{
		$array[] = $row;
	}
	return $array;
}

$movies=[];
$movieDirectors=[];
$movieActors=[];
$movieGenres=[];

$movies = fillArrayByDbQuery($movies, $moviesQuery);
$movieGenres = fillArrayByDbQuery($movieGenres, $movieGenresQuery);
$movieActors = fillArrayByDbQuery($movieActors, $movieActorsQuery);
$movieDirectors = fillArrayByDbQuery($movieDirectors, $movieDirectorsQuery);

foreach ($movies as &$movie)
{
	foreach ($movieGenres as $genre)
	{
		if ($movie['ID'] === $genre['MOVIE_ID'])
		{
			$movie['GENRES'][] = $genre['NAME'];
		}
	}
	foreach ($movieActors as $actor)
	{
		if ($movie['ID'] === $actor['MOVIE_ID'])
		{
			$movie['CAST'][] = $actor['NAME'];
		}
	}
	foreach ($movieDirectors as $director)
	{
		if ($movie['ID'] === $director['ID'])
		{
			$movie['DIRECTOR'][] = $director['NAME'];
		}
	}
}
