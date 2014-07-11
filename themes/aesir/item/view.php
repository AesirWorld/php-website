<?php if (!defined('FLUX_ROOT')) exit;?>
<div class="box3">
	<div class="title">Visualizando Item</div>
	<div class="content">
<?php if ($item_fromdb): ?>
<?php $icon = $this->iconImage($item_fromdb->item_id); ?>
<h3>
	<?php if ($icon): ?><img src="<?php echo $icon ?>" /><?php endif ?>
	#<?php echo htmlspecialchars($item_fromdb->item_id) ?>: <?php echo htmlspecialchars($item_fromdb->name) ?>
</h3>
<table class="vertical-table">
	<tr>
		<th>Item ID</th>
		<td><?php echo htmlspecialchars($item_fromdb->item_id) ?></td>
		<?php if ($image=$this->itemImage($item_fromdb->item_id)): ?>
		<td rowspan="8"
			style="width: 150px; text-align: center; vertical-alignment: middle">
			<img src="<?php echo $image ?>" />
		</td>
		<?php endif ?>
		<th>For Sale</th>
		<td>
			<?php if ($item_fromdb->cost): ?>
				<span class="for-sale yes">
					Yes
				</span>
			<?php else: ?>
				<span class="for-sale no">
					No
				</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Identifier</th>
		<td><?php echo htmlspecialchars($item_fromdb->identifier) ?></td>
		<th>Credit Price</th>
		<td>
			<?php if ($item_fromdb->cost): ?>
				<?php echo number_format((int)$item_fromdb->cost) ?>
			<?php else: ?>
				<span class="not-applicable">Not For Sale</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo htmlspecialchars($item_fromdb->name) ?></td>
		<th>Type</th>
		<td><?php echo $this->itemTypeText($item_fromdb->type) ?></td>
	</tr>
	<tr>
		<th>NPC Buy</th>
		<td><?php echo number_format((int)$item_fromdb->price_buy) ?></td>
		<th>Weight</th>
		<td><?php echo round($item_fromdb->weight, 1) ?></td>
	</tr>
	<tr>
		<th>NPC Sell</th>
		<td>
			<?php if (is_null($item_fromdb->price_sell) && $item_fromdb->price_buy): ?>
				<?php echo number_format(floor($item_fromdb->price_buy / 2)) ?>
			<?php else: ?>
				<?php echo number_format((int)$item_fromdb->price_sell) ?>
			<?php endif ?>
		</td>
		<th>Attack</th>
		<td><?php echo number_format((int)$item_fromdb->attack) ?></td>
	</tr>
	<tr>
		<th>Range</th>
		<td><?php echo number_format((int)$item_fromdb->range) ?></td>
		<th>Defense</th>
		<td><?php echo number_format((int)$item_fromdb->defence) ?></td>
	</tr>
	<tr>
		<th>Slots</th>
		<td><?php echo number_format((int)$item_fromdb->slots) ?></td>
		<th>Refineable</th>
		<td>
			<?php if ($item_fromdb->refineable): ?>
				Yes
			<?php else: ?>
				No
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Level</th>
		<td><?php echo number_format((int)$item_fromdb->equip_level) ?></td>
		<th>Weapon Level</th>
		<td><?php echo number_format((int)$item_fromdb->weapon_level) ?></td>
	</tr>
	<tr>
		<th>Equip Locations</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($locs=$this->equipLocations($item_fromdb->equip_locations)): ?>
				<?php echo htmlspecialchars(implode(' + ', $locs)) ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Upper</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($upper=$this->equipUpper($item_fromdb->equip_upper)): ?>
				<?php echo htmlspecialchars(implode(' / ', $upper)) ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equippable Jobs</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($jobs=$this->equippableJobs($item_fromdb->equip_jobs)): ?>
				<?php echo htmlspecialchars(implode(' / ', $jobs)) ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Gender</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($item_fromdb->equip_genders === '0'): ?>
				Female
			<?php elseif ($item_fromdb->equip_genders === '1'): ?>
				Male
			<?php elseif ($item_fromdb->equip_genders === '2'): ?>
				Both (Male and Female)
			<?php else: ?>
				<span class="not-applicable">Unknown</span>
			<?php endif ?>
		</td>
	</tr>
	<?php if (($isCustom && $auth->allowedToSeeItemDb2Scripts) || (!$isCustom && $auth->allowedToSeeItemDbScripts)): ?>
	<tr>
		<th>Item Use Script</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($script=$this->displayScript($item_fromdb->script)): ?>
				<?php echo $script ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Script</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($script=$this->displayScript($item_fromdb->equip_script)): ?>
				<?php echo $script ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Unequip Script</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($script=$this->displayScript($item_fromdb->unequip_script)): ?>
				<?php echo $script ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<?php endif ?>
</table>
<?php if ($itemDrops): ?>
<h3><?php echo htmlspecialchars($item_fromdb->name) ?> Dropped By</h3>
<table class="vertical-table">
	<tr>
		<th>Monster ID</th>
		<th>Monster Name</th>
		<th><?php echo htmlspecialchars($item_fromdb->name) ?> Drop Chance</th>
		<th>Monster Level</th>
		<th>Monster Race</th>
		<th>Monster Element</th>
	</tr>
	<?php foreach ($itemDrops as $itemDrops): ?>
	<tr class="item-drop-<?php echo $itemDrops['type'] ?>">
		<td align="right">
			<?php if ($auth->actionAllowed('monster', 'view')): ?>
				<?php echo $this->linkToMonster($itemDrops['monster_id'], $itemDrops['monster_id']) ?>
			<?php else: ?>
				<?php echo $itemDrops['monster_id'] ?>
			<?php endif ?>
		</td>
		<td>
			<?php if ($itemDrops['type'] == 'mvp'): ?>
				<span class="mvp">MVP!</span>
			<?php endif ?>
			<?php echo htmlspecialchars($itemDrops['monster_name']) ?>
		</td>
		<td><strong><?php echo $itemDrops['drop_chance'] ?>%</strong></td>
		<td><?php echo number_format($itemDrops['monster_level']) ?></td>
		<td><?php echo Flux::monsterRaceName($itemDrops['monster_race']) ?></td>
		<td>
			Level <?php echo floor($itemDrops['monster_ele_lv']) ?>
			<em><?php echo Flux::elementName($itemDrops['monster_element']) ?></em>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<?php endif ?>
<?php else: ?>
<p>No such item was found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
</div>
</div>