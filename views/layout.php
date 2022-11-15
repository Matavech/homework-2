<?php
/**
 * @var array $genres
 * @var string $title
 * @var array $movies
 * @var string $content
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
		<div class="logo">
		</div>
		<div class="menu">
			<div class="menu-item">
				<a href="../public/index.php">Главная</a>
			</div>
			<?php
			foreach ($genres as $genre): ?>
				<div class="menu-item">
					<a href="../public/movies-by-genre.php?genre=<?= $genre ?>"><?php
						echo $genre ?></a>
				</div>
			<?php
			endforeach; ?>
			<div class="menu-item">
				<a href="../public/favourites.php">Избранное</a>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="header">
			<div class="search">
				<div class="search-section">
					<div class="search-icon">
					</div>
					<div class="input">
						<input class="input-text" type="text" placeholder="Поиск по каталогу...">
					</div>
				</div>
				<div class="search-button">
					<input class="header-button" type="submit" value="Искать">
				</div>
			</div>
			<div class="add-movie-button">
				<a href="../public/add-movie.php" class="header-button" >Добавить фильм</a>
			</div>
		</div>
		<div class="content">
			<?= $content ?>
		</div>
	</div>
</div>
</body>
</html>