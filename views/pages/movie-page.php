<?php
/**
 * @var array $movies
 */
?>


<div class="move">
	<?= view('components/movie-page-content', [
		'movie' => $movies,
	]) ?>
</div>
