<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3 hide_left_container">
	<div class="title">Item</div>
	<div class="content">
<?php if ($itemFound): ?>
<h3>
	#<?php echo htmlspecialchars($itemFound->item_id) ?>: <?php echo htmlspecialchars($itemFound->name) ?>
</h3>
<table class="vertical-table">
	<tr>
		<?php if ($image=$this->itemImage($itemFound->item_id)): ?>
		<td rowspan="<?php echo ($server->isRenewal)?9:8 ?>" style="width: 150px; text-align: center; vertical-alignment: middle">
			<img src="<?php echo $image ?>" />
		</td>
		<?php endif ?>
		<th>Item ID</th>
		<td><?php echo htmlspecialchars($itemFound->item_id) ?></td>
		<th>For Sale</th>
		<td>
			<?php if ($itemFound->cost): ?>
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
		<td><?php echo htmlspecialchars($itemFound->identifier) ?></td>
		<th>Credit Price</th>
		<td>
			<?php if ($itemFound->cost): ?>
				<?php echo number_format((int)$itemFound->cost) ?>
			<?php else: ?>
				<span class="not-applicable">Not For Sale</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo htmlspecialchars($itemFound->name) ?></td>
		<th>Type</th>
		<td><?php echo $this->itemTypeText($itemFound->type, $itemFound->view) ?></td>
	</tr>
	<tr>
		<th>NPC Buy</th>
		<td><?php echo number_format((int)$itemFound->price_buy) ?></td>
		<th>Weight</th>
		<td><?php echo round($itemFound->weight, 1) ?></td>
	</tr>
	<tr>
		<th>NPC Sell</th>
		<td>
			<?php if (is_null($itemFound->price_sell) && $itemFound->price_buy): ?>
				<?php echo number_format(floor($itemFound->price_buy / 2)) ?>
			<?php else: ?>
				<?php echo number_format((int)$itemFound->price_sell) ?>
			<?php endif ?>
		</td>
		<th>Weapon Level</th>
		<td><?php echo number_format((int)$itemFound->weapon_level) ?></td>
	</tr>
	<tr>
		<th>Range</th>
		<td><?php echo number_format((int)$itemFound->range) ?></td>
		<th>Defense</th>
		<td><?php echo number_format((int)$itemFound->defence) ?></td>
	</tr>
	<tr>
		<th>Slots</th>
		<td><?php echo number_format((int)$itemFound->slots) ?></td>
		<th>Refineable</th>
		<td>
			<?php if ($itemFound->refineable): ?>
				Yes
			<?php else: ?>
				No
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>ATK</th>
		<td><?php echo number_format((int)$itemFound->atk) ?></td>
		<th>Min Equip Level</th>
		<td><?php echo number_format((int)$itemFound->equip_level_min) ?></td>
	</tr>
	<tr>
		<?php if($server->isRenewal): ?>
		<th>MATK</th>
		<td><?php echo number_format((int)$itemFound->matk) ?></td>
		<?php else: ?>
		<th> </th>
		<td> </td>
		<?php endif ?>
		<th>Max Equip Level</th>
		<td>
			<?php if ($itemFound->equip_level_max == 0): ?>
				<span class="not-applicable">None</span>
			<?php else: ?>
				<?php echo number_format((int)$itemFound->equip_level_max) ?>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Locations</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($locs=$this->equipLocations($itemFound->equip_locations)): ?>
				<?php echo htmlspecialchars(implode(' + ', $locs)) ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Upper</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($upper=$this->equipUpper($itemFound->equip_upper)): ?>
				<?php echo htmlspecialchars(implode(' / ', $upper)) ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equippable Jobs</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($jobs=$this->equippableJobs($itemFound->equip_jobs)): ?>
				<?php echo htmlspecialchars(implode(' / ', $jobs)) ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Gender</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($itemFound->equip_genders === '0'): ?>
				Female
			<?php elseif ($itemFound->equip_genders === '1'): ?>
				Male
			<?php elseif ($itemFound->equip_genders === '2'): ?>
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
			<?php if ($script=$this->displayScript($itemFound->script)): ?>
				<?php echo $script ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Equip Script</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($script=$this->displayScript($itemFound->equip_script)): ?>
				<?php echo $script ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>Unequip Script</th>
		<td colspan="<?php echo $image ? 4 : 3 ?>">
			<?php if ($script=$this->displayScript($itemFound->unequip_script)): ?>
				<?php echo $script ?>
			<?php else: ?>
				<span class="not-applicable">None</span>
			<?php endif ?>
		</td>
	</tr>
	<?php endif ?>
</table>
<?php if ($itemDrops): ?>
<h3><?php echo htmlspecialchars($itemFound->name) ?> Dropped By</h3>
<table class="vertical-table">
	<tr>
		<th>Monster ID</th>
		<th>Monster Name</th>
		<th><?php echo htmlspecialchars($itemFound->name) ?> Drop Chance</th>
		<th>Monster Level</th>
		<th>Monster Race</th>
		<th>Monster Element</th>
	</tr>
	<?php foreach ($itemDrops as $itemDrop): ?>
	<tr class="item-drop-<?php echo $itemDrop['type'] ?>">
		<td align="right">
			<?php if ($auth->actionAllowed('monster', 'view')): ?>
				<?php echo $this->linkToMonster($itemDrop['monster_id'], $itemDrop['monster_id']) ?>
			<?php else: ?>
				<?php echo $itemDrop['monster_id'] ?>
			<?php endif ?>
		</td>
		<td>
			<?php if ($itemDrop['type'] == 'mvp'): ?>
				<span class="mvp">MVP!</span>
			<?php endif ?>
			<?php echo htmlspecialchars($itemDrop['monster_name']) ?>
		</td>
		<td><strong><?php echo $itemDrop['drop_chance'] ?>%</strong></td>
		<td><?php echo number_format($itemDrop['monster_level']) ?></td>
		<td><?php echo Flux::monsterRaceName($itemDrop['monster_race']) ?></td>
		<td>
			Level <?php echo floor($itemDrop['monster_ele_lv']) ?>
			<em><?php echo Flux::elementName($itemDrop['monster_element']) ?></em>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<?php endif ?>
<?php else: ?>
<p>No such item was found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
</div></div>
