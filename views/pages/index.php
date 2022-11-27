<?php
/**
 * @var array $movies
 */
?>

<div class="move">
	<?php
	foreach ($movies as $movie): ?>
		<?= view('components/movie-list-content', [
			'movie' => $movie,
		])?>
	<?php endforeach ?>
</div>
