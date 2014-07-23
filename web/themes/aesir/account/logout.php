<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title"><?php echo htmlspecialchars(Flux::message('LogoutHeading')) ?></div>
<div class="content">
<p><strong><?php echo htmlspecialchars(Flux::message('LogoutInfo')) ?></strong> <?php printf(Flux::message('LogoutInfo2'), $metaRefresh['location']) ?></p>
</div></div>
