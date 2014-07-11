<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
	<div class="title">Preferências</div>
	<div class="content">
<?php if ($char): ?>
<?php if (!empty($errorMessage)): ?>
<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<h3>Vizualisando preferências de personagem "<?php echo ($charName=htmlspecialchars($char->name))  ?>" do <?php echo htmlspecialchars($server->serverName) ?></h3>
<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<input type="hidden" name="charprefs" value="1" />
	<table class="generic-form-table">
		<tr>
			<th><label for="hide_from_whos_online">Esconder personagem de "Quem está Online"</label></th>
			<td><input type="checkbox" name="hide_from_whos_online" id="hide_from_whos_online"<?php if ($hideFromWhosOnline) echo ' checked="checked"' ?> /></td>
			<td><p>Isso irá ocultar <?php echo $charName ?> da lista de "Quem está Online".</p></td>
		</tr>
		<tr>
			<th><label for="hide_map_from_whos_online">Esconder personagem de "Estatisticas de Mapa"</label></th>
			<td><input type="checkbox" name="hide_map_from_whos_online" id="hide_map_from_whos_online"<?php if ($hideMapFromWhosOnline) echo ' checked="checked"' ?> /></td>
			<td><p>Isso irá ocultar <?php echo $charName ?> das "Estatisticas de Mapa".</p></td>
		</tr>
		<?php if ($auth->allowedToHideFromZenyRank): ?>
		<tr>
			<th><label for="hide_from_zeny_ranking">Esconder personagem de "Ranking de Zeny"</label></th>
			<td><input type="checkbox" name="hide_from_zeny_ranking" id="hide_from_zeny_ranking"<?php if ($hideFromZenyRanking) echo ' checked="checked"' ?> /></td>
			<td><p>Isso irá ocultar <?php echo $charName ?> do "Ranking de Zeny".</p></td>
		</tr>
		<?php endif ?>
		<tr>
			<td align="right"><p><input type="submit" value="Modificar Preferências" /></p></td>
			<td colspan="2"></td>
		</tr>
	</table>
</form>
<?php else: ?>
<p>Nenhum personagem encontrado. <a href="javascript:history.go(-1)">Voltar</a>.</p>
<?php endif ?>
</div></div>
