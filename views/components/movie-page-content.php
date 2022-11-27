<?php
/**
 * @var array $movie
 * @var array $movies
 */
?>
<div class="movie-page-content">

	<div class="title-plus-favourite">
		<div class="title">
			<?= $movie['TITLE'] ?>
		</div>
		<div class="favourite">
			<button type="submit" class="like-button"><img src="/data/icons/like.svg" alt="V"></button>
		</div>
	</div>
	<div class="original-title-age">
		<div class="orig-title">
			<?= getOrigTitle($movie['ORIGINAL_TITLE']) ?>
		</div>
		<div class="age">
			<?= $movie['AGE_RESTRICTION'] ?>+
		</div>

	</div>
	<div class="line"></div>
	<div class="description-poster">
		<img class="movie-poster" src="/data/images/<?= $movie['ID'] ?>.jpg" , alt="no pic here">
		<div class="about-movie-descr">
			<div class="rating">
				<div class="rating-container">
					<?php
					for ($i = 1; $i <= round($movie['RATING']); $i++): ?>
						<div class="rating-item-active"></div>
					<?php
					endfor; ?>
					<?php
					for ($i = round($movie['RATING']) + 1; $i <= 10; $i++): ?>
						<div class="rating-item"></div>
					<?php
					endfor; ?>
				</div>
				<div class="rating-num">
					<?= $movie['RATING'] ?>
				</div>
			</div>
			<div class="movie-reference">О фильме</div>
			<div class="release-date-line">
				<div class="release-date">Год производства</div>
				<div class="year-release"><?= $movie['RELEASE_DATE'] ?></div>
			</div>
			<div class="director-line">
				<div class="director">Режиссер</div>
				<div class="director-name"><?= implode(', ',$movie['DIRECTOR'])?></div>
			</div>
			<div class="cast-line">
				<div class="cast">В главных ролях</div>
				<div class="name-cast"><?= implode(', ', $movie['CAST']) ?></div>
			</div>
			<div class="descr">Описание</div>
			<div class="full-descr"><?= $movie['DESCRIPTION'] ?></div>
		</div>
	</div>

</div>
