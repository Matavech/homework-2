<?php
/**
 * @var array $movies
 */
?>

	<?php foreach ($movies as $movie):
		if ($movie['id'] === (int)$_GET["id"]):
			?>
			<div class="move">
				<?= view('components/movie-page-content', [
					'movies' => $movies,
				]) ?>
			</div>
		<?php endif; endforeach;?>
