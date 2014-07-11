<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
	<div class="title"><?php echo htmlspecialchars(Flux::message('HistoryGameLoginHeading')) ?></div>
	<div class="content">
<?php if ($logins): ?>
<?php echo $paginator->infoText() ?>
<table class="horizontal-table">
	<tr>
		<th><?php echo $paginator->sortableColumn('time', Flux::message('HistoryLoginDateLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('ip', Flux::message('HistoryIpAddrLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('rcode', Flux::message('HistoryRepsCodeLabel')) ?></th>
		<th><?php echo $paginator->sortableColumn('log', Flux::message('HistoryLogMessageLabel')) ?></th>
	</tr>
	<?php foreach ($logins as $login): ?>
	<tr>
		<td><?php echo $this->formatDateTime($login->time) ?></td>
		<td><?php echo htmlspecialchars($login->ip) ?></td>
		<td><?php echo $login->rcode ?></td>
		<td><?php echo htmlspecialchars($login->log) ?></td>
	</tr>
	<?php endforeach ?>
</table>
<?php echo $paginator->getHTML() ?>
<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('HistoryNoGameLogins')) ?>
	<a href="javascript:history.go(-1)"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
</p>
<?php endif ?>
</div>
</div>