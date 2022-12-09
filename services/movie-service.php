<?php

function getMovieById($id): array
{
	$movieById = getDbResultByQuery(
		'SELECT * FROM movie m 
    INNER JOIN director d on m.DIRECTOR_ID = d.ID 
         WHERE m.ID = ' . $id . ' ORDER BY m.ID LIMIT 100'
	);
	$movieInfoByID = [];
	while ($row = mysqli_fetch_assoc($movieById))
	{
		$movieInfoByID[] = $row;
	}
	$actorsById = getDbResultByQuery(
		'SELECT * FROM actor a 
    INNER JOIN movie_actor ma on a.ID = ma.ACTOR_ID 
    INNER JOIN movie m on ma.MOVIE_ID = m.ID 
         where m.ID = ' . $id
	);
	$actors = [];
	while ($row = mysqli_fetch_assoc($actorsById))
	{
		$actors[] = $row;
	}
	$actorInStr = [];
	foreach ($actors as $actor)
	{
		$actorInStr[] = $actor['NAME'];
	}
	$movie = [];
	foreach ($movieInfoByID as $movieItem)
	{
		$movie = [
			'ID' => $movieItem['ID'],
			'TITLE' => $movieItem['TITLE'],
			'ORIGINAL_TITLE' => $movieItem['ORIGINAL_TITLE'],
			'DESCRIPTION' => $movieItem['DESCRIPTION'],
			'DURATION' => $movieItem['DURATION'],
			'CAST' => $actorInStr,
			'DIRECTOR' => $movieItem['NAME'],
			'AGE_RESTRICTION' => $movieItem['AGE_RESTRICTION'],
			'RELEASE_DATE' => $movieItem['RELEASE_DATE'],
			'RATING' => $movieItem['RATING'],
		];
	}

	return $movie;
}

/** @noinspection PhpUndefinedVariableInspection */
function getGenresFromDb(): array
{
	$result = getDbResultByQuery('SELECT CODE, NAME FROM genre');
	while ($row = mysqli_fetch_assoc($result))
	{
		$genres[$row['CODE']] = $row['NAME'];
	}

	return $genres;
}

function getMoviesFromDb($code): array
{
	$movies = [];
	$genres = [];
	$actors = [];
	$directors = [];
	$movies_ID = [];
	if (isset($code))
	{
		try
		{
			$code = mysqli_real_escape_string(getDbConnection(), $code);
		}
		catch (Exception $e)
		{
		}
		$moviesID_DB = getDbResultByQuery(
			"SELECT MOVIE_ID FROM movie_genre inner join 
        genre g on movie_genre.GENRE_ID = g.ID WHERE CODE = '" . $code . "'"
		);
	}
	else
	{
		$moviesID_DB = getDbResultByQuery(
			"SELECT MOVIE_ID FROM movie_genre inner join 
        genre g on movie_genre.GENRE_ID = g.ID"
		);
	}
	while ($row = mysqli_fetch_array($moviesID_DB))
	{
		$movies_ID[] = $row['MOVIE_ID'];
	}
	$moviesDB = getDbResultByQuery('SELECT * FROM movie WHERE ID IN (' . implode(',', $movies_ID) . ')');
	$genresDB = getDbResultByQuery(
		'
		SELECT MOVIE_ID, NAME FROM movie_genre 
        inner join genre g on movie_genre.GENRE_ID = g.ID WHERE MOVIE_ID IN (' . implode(',', $movies_ID) . ')
        '
	);
	$actorsDB = getDbResultByQuery(
		'
		SELECT MOVIE_ID, NAME FROM movie_actor
		inner join actor a on movie_actor.ACTOR_ID = a.ID WHERE MOVIE_ID IN (' . implode(',', $movies_ID) . ')
		'
	);
	$directorsDB = getDbResultByQuery(
		'SELECT m.ID, NAME FROM director 
    inner join movie m on director.ID = m.DIRECTOR_ID WHERE m.ID IN (' . implode(',', $movies_ID) . ')'
	);
	while ($row = mysqli_fetch_assoc($moviesDB))
	{
		$movies[$row['ID']] = $row;
	}
	while ($row = mysqli_fetch_assoc($directorsDB))
	{
		$directors[] = $row;
	}
	while ($row = mysqli_fetch_assoc($genresDB))
	{
		$genres[] = $row;
	}
	while ($row = mysqli_fetch_assoc($actorsDB))
	{
		$actors[] = $row;
	}
	foreach ($movies as &$movie)
	{
		foreach ($genres as $genre)
		{
			if ($movie['ID'] === $genre['MOVIE_ID'])
			{
				$movie['GENRES'][] = $genre['NAME'];
			}
		}
		foreach ($actors as $actor)
		{
			if ($movie['ID'] === $actor['MOVIE_ID'])
			{
				$movie['CAST'][] = $actor['NAME'];
			}
		}
		foreach ($directors as $director)
		{
			if ($movie['ID'] === $director['ID'])
			{
				$movie['DIRECTOR'] = $director['NAME'];
			}
		}
	}

	return $movies;
}

function getDescription(string $description): string
{
	if (strlen($description) < 180)
	{
		return $description;
	}

	$cropped = mb_substr($description, 0, 200);

	return $cropped . '...';
}

/** @noinspection PhpLoopNeverIteratesInspection */
function getGenres(array $genres): string
{
	$genresForMovie = [];
	if (count($genres) > 3)
	{
		/** @noinspection LoopWhichDoesNotLoopInspection */
		for ($i = 0; $i < 3; $i++)
		{
			$genresForMovie[$i] = $genres[$i];

			return implode(',', $genresForMovie);
		}
	}

	return implode(',', $genres);
}

function getDuration(int $minutes): string
{
	return $minutes . ' мин.' . ' / ' . date('H:i', mktime(0, $minutes));
}

function getTitle(string $title): string
{
	if (strlen($title) > 40)
	{
		return mb_substr($title, 0, 40) . "...";
	}

	return $title;
}

function getOrigTitle(string $title): string
{
	if (strlen($title) > 15)
	{
		return mb_substr($title, 0, 12) . "...";
	}

	return $title;
}

