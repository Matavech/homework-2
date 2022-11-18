<?php

function getDescription(string $description): string
{
	if (strlen($description) < 180)
	{
		return $description;
	}

	$cropped = mb_substr($description, 0, 200);
	return $cropped . '...';
}

function getGenres(array $genres): string
{
	$temp = [];
	if (count($genres) > 3)
	{
		for ($i = 0; $i < 3; $i++)
		{
			$temp[$i] = $genres[$i];
			return implode(',', $temp);
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

function getMoviesByGenre(string $code, array $movies, array $genres): array
{
	$moviesOfGenre = [];

	foreach($movies as $movie)
	{
		if ((isset($genres[$code]) && in_array($genres[$code], $movie['genres'], true)))
		{
			$moviesOfGenre[] = $movie;
		}

	}
	return $moviesOfGenre;
}

function getMovieById(array $movies, int $id): array
{
	foreach ($movies as $movie)
	{
		if ($movie['id'] === $id)
		{
			return $movie;
		}
	}
	return [];
}