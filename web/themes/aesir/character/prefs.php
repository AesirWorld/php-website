<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title"><?php echo Flux::message('character.prefs.title') ?></div>
<div class="content">
<?php if ($char): ?>
<?php if (!empty($errorMessage)): ?>
<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<h3><?php echo sprintf(Flux::message('character.prefs.viewingCharcter'), ($charName=htmlspecialchars($char->name)), htmlspecialchars($server->serverName)) ?></h3>
<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<input type="hidden" name="charprefs" value="1" />
	<?php echo Flux_Security::csrfGenerate('CharacterPreferences', true) ?>

	<table class="generic-form-table">
		<tr>
			<th><label for="hide_from_whos_online"><?php echo Flux::message('character.prefs.onlineText') ?></label></th>
			<td><input type="checkbox" name="hide_from_whos_online" id="hide_from_whos_online"<?php if ($hideFromWhosOnline) echo ' checked="checked"' ?> /></td>
			<td><p><?php echo sprintf(Flux::message('character.prefs.onlineLabel'), $charName) ?></p></td>
		</tr>
		<tr>
			<th><label for="hide_map_from_whos_online"><?php echo Flux::message('character.prefs.mapText') ?></label></th>
			<td><input type="checkbox" name="hide_map_from_whos_online" id="hide_map_from_whos_online"<?php if ($hideMapFromWhosOnline) echo ' checked="checked"' ?> /></td>
			<td><p><?php echo sprintf(Flux::message('character.prefs.mapLabel'), $charName) ?></p></td>
		</tr>
		<?php if ($auth->allowedToHideFromZenyRank): ?>
		<tr>
			<th><label for="hide_from_zeny_ranking"><?php echo Flux::message('character.prefs.zenyText') ?></label></th>
			<td><input type="checkbox" name="hide_from_zeny_ranking" id="hide_from_zeny_ranking"<?php if ($hideFromZenyRanking) echo ' checked="checked"' ?> /></td>
			<td><p><?php echo sprintf(Flux::message('character.prefs.zenyLabel'), $charName) ?></p></td>
		</tr>
		<?php endif ?>
		<tr>
			<td align="right"><p><input type="submit" value="<?php echo Flux::message('character.prefs.submit') ?>" /></p></td>
			<td colspan="2"></td>
		</tr>
	</table>
</form>
<?php else: ?>
<p>No such character found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
</div>
</div>
