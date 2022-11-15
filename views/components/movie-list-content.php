<?php
/**
 * @var array $movie
 */
?>
<div class="move-item">
	<div class="movie-img">
		<img class="poster" src='../data/images/<?= $movie['id'] ?>.jpg' , alt='NO PICTURE HERE'>
	</div>
	<div class="movie-info">
		<div class='movie-title'><?= getTitle($movie['title']) ?></div>
		<div class='original-title'><?= getTitle($movie['original-title']) ?></div>
		<div class='description'><?= getDescription($movie['description']) ?></div>
		<div class='clock-logo'></div>
		<div class='duration'><?= getDuration($movie['duration']) ?></div>
		<div class='genres'><?= getGenres($movie['genres']) ?></div>
		<div class="move-item-overlay">
			<a href="../../public/movie-page.php?id=<?= $movie['id'] ?>" class="move-item-read-move">Подробнее</a>
		</div>
	</div>
</div>