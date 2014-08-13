<?php
if (!defined('FLUX_ROOT')) exit;

$title = Flux::message('MissingViewTitle');

/* Overide default page (hack) */
include("404.php");
exit;
?>
