<?php
if (!defined('FLUX_ROOT')) exit;

//Cache
header("Cache-Control: public, max-age=".Flux::config('CacheTimeHigh'));

$this->redirect($this->url('purchase', 'cart'));
?>
