<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title">Change Character Slot</div>
<div class="content">
<?php if (!empty($errorMessage)): ?>
<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<input type="hidden" name="changeslot" value="1" />
	<?php echo Flux_Security::csrfGenerate('SlotEdit', true) ?>

	<table class="generic-form-table">
		<tr>
			<th><label><?php echo Flux::message('character.changeslot.label1') ?></label></th>
			<td><div><?php echo htmlspecialchars($char->name) ?></div></td>
			<td></td>
		</tr>
		<tr>
			<th><label for="slot">Slot Number</label></th>
			<td><input type="text" name="slot" id="slot"
					size="<?php echo strlen($server->maxCharSlots) * 2 ?>"
					value="<?php echo (int)$char->char_num + 1 ?>"
					maxlength="<?php echo strlen($server->maxCharSlots) ?>" /></td>
			<td><p><?php echo sprintf(Flux::message('character.changeslot.slotsAvail'), (int)$server->maxCharSlots) ?></p></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Change Slot" /></td>
			<td></td>
		</tr>
	</table>
</form>
</div>
</div>
