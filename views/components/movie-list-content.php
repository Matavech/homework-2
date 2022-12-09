<?php
/**
 * @var array $movie
 */

?>
<div class="move-item">
	<div class="movie-img">
		<img class="poster" src='/data/images/<?= $movie['ID'] ?>.jpg' , alt='NO PICTURE HERE'>
	</div>
	<div class="movie-info">
		<div class='movie-title'><?= getTitle($movie['TITLE']) ?></div>
		<div class='original-title'><?= getTitle($movie['ORIGINAL_TITLE']) ?></div>
		<div class='description'><?= getDescription($movie['DESCRIPTION']) ?></div>
		<div class='clock-logo'></div>
		<div class='duration'><?= getDuration($movie['DURATION']) ?></div>
		<div class='genres'><?= getGenres($movie['GENRES']) ?></div>
		<div class="move-item-overlay">
			<a href="/movie-page.php?id=<?= $movie['ID'] ?>" class="move-item-read-move">Подробнее</a>
		</div>
	</div>
</div>
