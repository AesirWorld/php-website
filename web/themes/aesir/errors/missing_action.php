<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title"><?php echo htmlspecialchars(Flux::message('MissingActionHeading')) ?></div>
<div class="content">
<p><?php echo htmlspecialchars(Flux::message('MissingActionModLabel')) ?> <span class="module-name"><?php echo $this->params->get('module') ?></span>, <?php echo htmlspecialchars(Flux::message('MissingActionActLabel')) ?> <span class="module-name"><?php echo $this->params->get('action') ?></span></p>
<p><?php echo htmlspecialchars(Flux::message('MissingActionReqLabel')) ?> <span class="request"><?php echo $_SERVER['REQUEST_URI'] ?></span></p>
</div>
</div>
