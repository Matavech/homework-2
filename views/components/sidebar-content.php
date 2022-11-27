<?php
/**
 * @var array $genres
 */
?>

<?php
foreach ($genres as $key => $genre): ?>
	<div class="menu-item">
		<a href="/index.php?genre=<?= $key ?>"><?php
			echo $genre ?></a>
	</div>
<?php
endforeach; ?>

