<?php
/**
 * @var array $movies
 */
?>

<div class="move">
	<?php
	foreach ($movies as $movie):
		$movie_genre = (string)$_GET["genre"];
		if (in_array($movie_genre, $movie['GENRES'])):?>
			<?= view('components/movie-list-content', [
				'movie' => $movie,
			]) ?>
		<?php
		endif; ?>
	<?php
	endforeach; ?>
</div>
