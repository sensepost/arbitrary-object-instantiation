<?php

if (!isset($_REQUEST['module']) || !isset($_REQUEST['params'])) {
	echo "unknown operation";
	die();
}

$module = $_REQUEST['module'];
$params = $_REQUEST['params'];
$size = isset($_REQUEST['size']) ? $_REQUEST['size'] : 10;

if ($module === 'Imagick') {

	$size = $size > 10 ? 10 : $size;

	$width = 400 * $size;
	$height = 400 * $size;

	$img = new $module($params == 'NULL'? NULL : $params);
	$img->newImage($width, $height, new ImagickPixel('transparent'));

	$draw = new ImagickDraw();

	// orange square
	$draw->setFillColor('#FF7800');
	$draw->rectangle(0, 0, 400 * $size, 400 * $size);

	// white line
	$draw->setFillColor('#FFFFFF');
	$draw->rectangle(50 * $size, 300 * $size, 350 * $size, 350 * $size);

	$img->drawImage($draw);
	$img->setImageFormat('png');

	header('Content-Type: image/png');
	echo $img;
} elseif ($module === 'PDO') {

	$pdo = new $module($params == 'NULL'? NULL : $params);
	echo "the database seems okay";
} else {

	new $module($params);
}
