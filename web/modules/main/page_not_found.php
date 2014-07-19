<?php
if (!defined('FLUX_ROOT')) exit;

//Cache
header("Cache-Control: public, max-age=".Flux::config('CacheTimeHigh'));

header('HTTP/1.1 404 Not Found');
$title = Flux::message('PageNotFoundTitle');
?>
