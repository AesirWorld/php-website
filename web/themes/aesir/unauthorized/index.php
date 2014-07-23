<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title" class="red"><?php echo htmlspecialchars(Flux::message('UnauthorizedHeading')) ?></div>
<div class="content">
<p><?php printf(Flux::message('UnauthorizedInfo'), $metaRefresh['location']) ?></p>
</div>
</div>
