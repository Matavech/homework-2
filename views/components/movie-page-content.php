<?php
/**
 * @var array $movie
 * @var array $movies
 */
?>
<div class="movie-page-content">

	<div class="title-plus-favourite">
		<div class="title">
			<?= $movie['title'] ?>
		</div>
		<div class="favourite">
			<button type="submit" class="like-button"><img src="/data/icons/like.svg" alt="V"></button>
		</div>
	</div>
	<div class="original-title-age">
		<div class="orig-title">
			<?= getOrigTitle($movie['original-title']) ?>
		</div>
		<div class="age">
			<?= $movie['age-restriction'] ?>+
		</div>

	</div>
	<div class="line"></div>
	<div class="description-poster">
		<img class="movie-poster" src="/data/images/<?= $movie['id'] ?>.jpg" , alt="no pic here">
		<div class="about-movie-descr">
			<div class="rating">
				<div class="rating-container">
					<?php
					for ($i = 1; $i <= round($movie['rating']); $i++): ?>
						<div class="rating-item-active"></div>
					<?php
					endfor; ?>
					<?php
					for ($i = round($movie['rating']) + 1; $i <= 10; $i++): ?>
						<div class="rating-item"></div>
					<?php
					endfor; ?>
				</div>
				<div class="rating-num">
					<?= $movie['rating'] ?>
				</div>
			</div>
			<div class="movie-reference">О фильме</div>
			<div class="release-date-line">
				<div class="release-date">Год производства</div>
				<div class="year-release"><?= $movie['release-date'] ?></div>
			</div>
			<div class="director-line">
				<div class="director">Режиссер</div>
				<div class="director-name"><?= $movie['director'] ?></div>
			</div>
			<div class="cast-line">
				<div class="cast">В главных ролях</div>
				<div class="name-cast"><?= implode(',', $movie['cast']) ?></div>
			</div>
			<div class="descr">Описание</div>
			<div class="full-descr"><?= $movie['description'] ?></div>
		</div>
	</div>

</div>