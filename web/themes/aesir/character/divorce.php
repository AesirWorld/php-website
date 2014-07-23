<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
<div class="title"><?php echo htmlspecialchars(Flux::message('DivorceHeading')) ?></div>
<div class="content">
<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<input type="hidden" name="divorce" value="1" />
	<?php echo Flux_Security::csrfGenerate('Divorce', true) ?>

	<table class="generic-form-table">
		<tr>
			<td>
				<p>
				<?php echo htmlspecialchars(sprintf(Flux::message('DivorceText1'), $char->name)) ?>
				<?php if (!Flux::config('DivorceKeepChild')) echo htmlspecialchars(sprintf(Flux::message('DivorceText2'), $char->name)) ?>
				<?php if (!Flux::config('DivorceKeepRings')) echo htmlspecialchars(Flux::message('DivorceText3')) ?>
				</p>
			</td>
		</tr>
		<tr>
			<td><button type="submit"><strong><?php echo htmlspecialchars(Flux::message('DivorceButton')) ?></strong></button></td>
		</tr>
	</table>
</form>
</div>
</div>
