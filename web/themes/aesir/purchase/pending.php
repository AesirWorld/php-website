<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="box3">
	<div class="title">Retiradas Pendentes</span></div>
	<div class="content">
<?php if ($items): ?>
<p>Você <?php echo number_format($total) ?> item(s) na entregadora.</p>
<table class="vertical-table">
	<tr>
		<th>Item</th>
		<th>Quantidade</th>
		<th>Custo</th>
		<th>Crédito (Antes)</th>
		<th>Crédito (Depois)</th>
		<th>Data da Comra</th>
	</tr>
	<?php foreach ($items as $item): ?>
	<tr>
		<td align="right">
			<?php if ($item->item_name): ?>
				<?php if ($auth->actionAllowed('item', 'view')): ?>
					<?php echo $this->linkToItem($item->nameid, $item->item_name) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($item->nameid) ?>
				<?php endif ?>
			<?php else: ?>
				<span class="not-applicable">Unknown</span>
			<?php endif ?>
		</td>
		<td><?php echo number_format($item->quantity) ?></td>
		<td><?php echo number_format($item->cost) ?></td>
		<td><?php echo number_format($item->credits_before) ?></td>
		<td><?php echo number_format($item->credits_after) ?></td>
		
		<td><?php echo $this->formatDateTime($item->purchase_date) ?></td>
	</tr>
	<?php endforeach ?>
</table>
<?php else: ?>
<p>Você atualmente não tem nenhum item já comprado nesta loja.
	Se você gostaria de realizar uma compra, por favor siga para <a href="<?php echo $this->url('purchase') ?>">shop</a>.</p>
<?php endif ?>
</div>
</div>