<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3 hide_right_container">
	<div class="title"><?php echo htmlspecialchars(Flux::message('AccDetailsTitle')) ?><span></div>
	<div class="content">
<?php if (!empty($errorMessage)): ?>
<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<?php if ($account): ?>
<table class="responsive">
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('UsernameLabel')) ?></th>
		<td><?php echo $account->userid ?></td>
		<th><?php echo htmlspecialchars(Flux::message('AccountIdLabel')) ?></th>
		<td>
			<?php if ($auth->allowedToSeeAccountID): ?>
				<?php echo $account->account_id ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NotApplicableLabel')) ?></span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('EmailAddressLabel')) ?></th>
		<td>
			<?php if ($account->email): ?>
				<?php echo htmlspecialchars($account->email) ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
			<?php endif ?>
		</td>
		<th><?php echo htmlspecialchars(Flux::message('AccountLevelLabel')) ?></th>
		<td><?php echo (int)$account->level ?></td>
	</tr>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('GenderLabel')) ?></th>
		<td>
			<?php if ($gender = $this->genderText($account->sex)): ?>
				<?php echo $gender ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
			<?php endif ?>
		</td>
		<th><?php echo htmlspecialchars(Flux::message('AccountStateLabel')) ?></th>
		<td>
			<?php if (!$account->confirmed && $account->confirm_code): ?>
				<span class="account-state state-pending">
					<?php echo htmlspecialchars(Flux::message('AccountStatePending')) ?>
				</span>
			<?php elseif (($state = $this->accountStateText($account->state)) && !$account->unban_time): ?>
				<?php echo $state ?>
			<?php elseif ($account->unban_time): ?>
				<span class="account-state state-banned">
					<?php printf(htmlspecialchars(Flux::message('AccountStateTempBanned')), date(Flux::config('DateTimeFormat'), $account->unban_time)) ?>
				</span>
			<?php else: ?>
				<span class="account-state state-unknown"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('LoginCountLabel')) ?></th>
		<td><?php echo number_format((int)$account->logincount) ?></td>
		<th><?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?></th>
		<td>
			<?php echo number_format((int)$account->balance) ?>
			<?php if ($auth->allowedToDonate && $isMine): ?>
				<a href="<?php echo $this->url('donate') ?>"><?php echo htmlspecialchars(Flux::message('AccountViewDonateLink')) ?></a>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('LastLoginDateLabel')) ?></th>
		<td colspan="3">
			<?php if (!$account->lastlogin || $account->lastlogin == '0000-00-00 00:00:00'): ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
			<?php else: ?>
				<?php echo $this->formatDateTime($account->lastlogin) ?>
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('LastUsedIpLabel')) ?></th>
		<td colspan="3">
			<?php if ($account->last_ip): ?>
				<?php echo $account->last_ip ?>
			<?php else: ?>
				<span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
			<?php endif ?>
		</td>
	</tr>
	<?php if ($showTempBan): ?>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('AccountViewTempBanLabel')) ?></th>
		<td colspan="3">
			<form action="<?php echo $this->urlWithQs ?>" method="post">
				<input type="hidden" name="tempban" value="1" />
				<label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
				<label><?php echo htmlspecialchars(Flux::message('AccountBanUntilLabel')) ?></label>
				<?php echo $this->dateTimeField('tempban'); ?>
				<input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountTempBanButton')) ?>"
					onclick="return confirm('<?php echo $banconfirm=htmlspecialchars(str_replace("'", "\\'", Flux::message('AccountBanConfirm'))) ?>')" />
			</form>
		</td>
	</tr>
	<?php endif ?>
	<?php if ($showPermBan): ?>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('AccountViewPermBanLabel')) ?></th>
		<td colspan="3">
			<form action="<?php echo $this->urlWithQs ?>" method="post">
				<input type="hidden" name="permban" value="1" />
				<label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
				<input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountPermBanButton')) ?>"
					onclick="return confirm('<?php echo $banconfirm ?>')" />
			</form>
		</td>
	</tr>
	<?php endif ?>
	<?php if ($showUnban): ?>
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('AccountViewUnbanLabel')) ?></th>
		<td colspan="3">
			<form action="<?php echo $this->urlWithQs ?>" method="post">
				<input type="hidden" name="unban" value="1" />
			<?php if ($tempBanned && $auth->allowedToTempUnbanAccount): ?>
				<label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
				<input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountTempUnbanButton')) ?>" />
			<?php elseif ($permBanned && $auth->allowedToPermUnbanAccount): ?>
				<label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
				<input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountPermUnbanButton')) ?>" />
			<?php endif ?>
			</form>
		</td>
	</tr>
	<?php endif ?>
</table>

<?php if ($auth->allowedToViewAccountBanLog && $banInfo): ?>
<h3><?php echo htmlspecialchars(sprintf(Flux::message('AccountBanLogSubHeading'), $account->userid)) ?></h3>
<table class="responsive">
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('BanLogBanTypeLabel')) ?></th>
		<th><?php echo htmlspecialchars(Flux::message('BanLogBanDateLabel')) ?></th>
		<th><?php echo htmlspecialchars(Flux::message('BanLogBanReasonLabel')) ?></th>
		<th><?php echo htmlspecialchars(Flux::message('BanLogBannedByLabel')) ?></th>
	</tr>
	<?php foreach ($banInfo as $ban): ?>
	<tr>
		<td align="right"><?php echo htmlspecialchars($this->banTypeText($ban->ban_type)) ?></td>
		<td><?php echo htmlspecialchars($this->formatDateTime($ban->ban_date)) ?></td>
		<td><?php echo nl2br(htmlspecialchars($ban->ban_reason)) ?></td>
		<td>
			<?php if ($ban->userid): ?>
				<?php if ($auth->allowedToViewAccount): ?>
					<?php echo $this->linkToAccount($ban->banned_by, $ban->userid) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($ban->userid) ?>
				<?php endif ?>
			<?php else: ?>
				<strong><?php echo htmlspecialchars(Flux::message('BanLogBannedByCP')) ?></strong>
			<?php endif ?>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<?php endif ?>

<?php foreach ($characters as $serverName => $chars): $zeny = 0; ?>
	<h3><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewCharSubHead'), $serverName)) ?></h3>
	<?php if ($chars): ?>
	<table class="responsive">
		<tr>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewSlotLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewCharLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewClassLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewLvlLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewJlvlLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewZenyLabel')) ?></th>
			<th colspan="2"><?php echo htmlspecialchars(Flux::message('AccountViewGuildLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewStatusLabel')) ?></th>
			<?php if (($isMine || $auth->allowedToModifyCharPrefs) && $auth->actionAllowed('character', 'prefs')): ?>
			<th><?php echo htmlspecialchars(Flux::message('AccountViewPrefsLabel')) ?></th>
			<?php endif ?>
		</tr>
		<?php foreach ($chars as $char): $zeny += $char->zeny; ?>
		<tr>
			<td align="right"><?php echo $char->char_num+1 ?></td>
			<td>
				<?php if ($auth->actionAllowed('character', 'view') && ($isMine || (!$isMine && $auth->allowedToViewCharacter))): ?>
					<?php echo $this->linkToCharacter($char->char_id, $char->name, $serverName) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($char->name) ?>
				<?php endif ?>
			</td>
			<td><?php echo htmlspecialchars($this->jobClassText($char->class)) ?></td>
			<td><?php echo (int)$char->base_level ?></td>
			<td><?php echo (int)$char->job_level ?></td>
			<td><?php echo number_format((int)$char->zeny) ?></td>
			<?php if ($char->guild_name): ?>
				<?php if ($char->guild_emblem_len): ?>
				<td><img src="<?php echo $this->emblem($char->guild_id) ?>" /></td>
				<?php endif ?>
				<td<?php if (!$char->guild_emblem_len) echo ' colspan="2"' ?>>
					<?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
						<?php echo $this->linkToGuild($char->guild_id, $char->guild_name) ?>
					<?php else: ?>
						<?php echo htmlspecialchars($char->guild_name) ?>
					<?php endif ?>
				</td>
			<?php else: ?>
				<td colspan="2" align="center"><span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span></td>
			<?php endif ?>
			<td>
				<?php if ($char->online): ?>
					<span class="online"><?php echo htmlspecialchars(Flux::message('OnlineLabel')) ?></span>
				<?php else: ?>
					<span class="offline"><?php echo htmlspecialchars(Flux::message('OfflineLabel')) ?></span>
				<?php endif ?>
			</td>
			<?php if (($isMine || $auth->allowedToModifyCharPrefs) && $auth->actionAllowed('character', 'prefs')): ?>
			<td>
				<a href="<?php echo $this->url('character', 'prefs', array('id' => $char->char_id)) ?>"
					class="block-link">
					<?php echo htmlspecialchars(Flux::message('CharModifyPrefsLink')) ?>
				</a>
			</td>
			<?php endif ?>
		</tr>
		<?php endforeach ?>
		</table>
		<p>Total Zeny: <strong><?php echo number_format($zeny) ?></strong></p>
	<?php else: ?>
	<p><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewNoChars'), $serverName)) ?></p>
	<?php endif ?>
<?php endforeach ?>

<?php else: ?>
<p>
	<?php echo htmlspecialchars(Flux::message('AccountViewNotFound')) ?>
	<a href="javascript:history.go(-1)"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
</p>
<?php endif ?>
</div></div>