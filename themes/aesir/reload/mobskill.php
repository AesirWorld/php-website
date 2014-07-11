<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="box3">
	<div class="title"><?php echo htmlspecialchars(Flux::message('ReloadMobSkillsHeading')) ?></div>
	<div class="content">
	<?php if (!empty($errorMessage)): ?>
	<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
	<?php else: ?>
	<p><?php echo htmlspecialchars(sprintf(Flux::message('ReloadMobSkillsInfo'), number_format(filesize($mobDB)))) ?></p>
	<?php endif ?>
</div>
</div>