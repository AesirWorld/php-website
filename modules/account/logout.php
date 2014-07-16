<?php
if (!defined('FLUX_ROOT')) exit;

//Cache
header("Cache-Control: private");

$title = Flux::message('LogoutTitle');

$session->logout();
$metaRefresh = array('seconds' => 2, 'location' => $this->basePath);
?>
