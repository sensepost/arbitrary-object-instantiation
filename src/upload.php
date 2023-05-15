<?php

$s = (int)$_REQUEST['size'];
header('Location: /image.php?module=Imagick&params=NULL&size=' . (string)$s);
