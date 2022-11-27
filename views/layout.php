<?php
/**
 * @var array $genres
 * @var string $title
 * @var array $movies
 * @var string $content
 * @var string $sidebar_content
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<div class="sidebar">
		<a href="/index.php"><img src="/data/icons/logo-bitflix.svg" class="logo"></a>
		<div class="menu">
			<div class="menu-item">
				<a href="/index.php">Главная</a>
			</div>
			<?= $sidebar_content ?>
			<div class="menu-item">
				<a href="/favourites.php">Избранное</a>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="header">
			<div class="search">
				<div class="search-section">
					<div class="search-icon-div">
						<img src="/data/icons/search.png" , alt="X" class="search-icon">
					</div>
					<div class="input">
						<input class="input-text" type="text" placeholder="Поиск по каталогу...">
					</div>
				</div>
				<div class="search-button">
					<a href="#" class="header-button">Искать</a>
				</div>
			</div>
			<div class="add-movie-button">
				<a href="/add-movie.php" class="header-button">Добавить фильм</a>
			</div>

		</div>
		<div class="content">
			<?= $content ?>
		</div>
	</div>
</div>
</body>
</html>
