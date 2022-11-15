<?php

function getDescription(string $desctiprion): string {
	if (strlen($desctiprion) < 180) {
		return $desctiprion;
	}

	$cropped = mb_substr($desctiprion, 0, 200);
	return $cropped . '...';
}

function getGenres(array $genres): string {
	$temp = [];
	if (count($genres) > 3){
		for ($i = 0; $i < 3; $i++){
			$temp[$i] = $genres[$i];
			return implode(',', $temp);
		}
	}
	return implode(',', $genres);
}

function getDuration(int $minutes): string {
	return $minutes . ' мин.' . ' / ' . date('H:i', mktime(0,$minutes));
}

function getTitle(string $title): string {
	if (strlen($title) > 40) {
		return mb_substr($title, 0, 40) . "...";
	}
	return $title;
}

function getOrigTitle(string $title): string {
	if (strlen($title) > 15){
		return mb_substr($title, 0, 12 ) . "...";
	}
	return $title;
}
