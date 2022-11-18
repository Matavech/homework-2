<?php
/**
 * @var array $genres
 */
?>

<?php
foreach ($genres as $genre): ?>
	<div class="menu-item">
		<a href="/index.php?genre=<?= $genre ?>"><?php
			echo $genre ?></a>
	</div>
<?php
endforeach; ?>