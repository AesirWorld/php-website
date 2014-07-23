<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title"><?php echo htmlspecialchars(Flux::message('PageNotFoundHeading')) ?></div>
<div class="content">
<p><?php echo htmlspecialchars(Flux::message('PageNotFoundInfo')) ?></p>
<p><span class="request"><?php echo $_SERVER['REQUEST_URI'] ?></span></p>
</div>
</div>
