<?php
if (!defined('FLUX_ROOT')) exit;

$title = Flux::message('MissingActionTitle');

/* Overide default page (hack) */
include("404.php");
exit;
?>
