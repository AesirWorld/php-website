<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3 register">			
	<div class="title">Registro</div>
    <div class="content">
                

<p><?php echo htmlspecialchars(Flux::message('AccountCreateInfo')) ?></p>
<?php if (Flux::config('RequireEmailConfirm')): ?>
<p><strong>Note:</strong> You will need to provide a working e-mail address to confirm your account before you can log-in.</p>
<?php endif ?>
<?php if (isset($errorMessage)): ?>
<p class="red" style="font-weight: bold"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>


<form action="<?php echo $this->url ?>" method="post">
	<?php if (count($serverNames) === 1): ?>
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
	<?php endif ?>
	<table class="generic-form-table">
		<?php if (count($serverNames) > 1): ?>
		<tr>
			<th><label for="register_server"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label></th>
			<td>
				<select name="server" id="register_server"<?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
				<?php foreach ($serverNames as $serverName): ?>
					<option value="<?php echo htmlspecialchars($serverName) ?>"<?php if ($params->get('server') == $serverName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($serverName) ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>
		<?php endif ?>
		
		<tr>
			<th><label for="register_username"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label></th>
			<td><input type="text" name="username" id="register_username" value="<?php echo htmlspecialchars($params->get('username')) ?>" /></td>
		</tr>
		
		<tr>
			<th><label for="register_password"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label></th>
			<td><input type="password" name="password" id="register_password" /></td>
		</tr>
		
		<tr>
			<th><label for="register_confirm_password"><?php echo htmlspecialchars(Flux::message('AccountPassConfirmLabel')) ?></label></th>
			<td><input type="password" name="confirm_password" id="register_confirm_password" /></td>
		</tr>
		
		<tr>
			<th><label for="register_email_address"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel')) ?></label></th>
			<td><input type="text" name="email_address" id="register_email_address" value="<?php echo htmlspecialchars($params->get('email_address')) ?>" /></td>
		</tr>
		
		<tr>
			<th><label><?php echo htmlspecialchars(Flux::message('AccountGenderLabel')) ?></label></th>
			<td>
				<p>
					<label><input type="radio" name="gender" id="register_gender_m" value="M"<?php if ($params->get('gender') === 'M') echo ' checked="checked"' ?> /> <?php echo $this->genderText('M') ?></label>
					<label><input type="radio" name="gender" id="register_gender_f" value="F"<?php if ($params->get('gender') === 'F') echo ' checked="checked"' ?> /> <?php echo $this->genderText('F') ?></label>
					<strong title="<?php echo htmlspecialchars(Flux::message('AccountCreateGenderInfo')) ?>">?</strong>
				</p>
			</td>
		</tr>
		
		<tr>
			<th><label>Onde você conheceu o servidor? (opcional)</label></th>
			<td>
				<p>
					<label>
						<select name="source" id="register_source" value="">
							<option value=""></option>
							<option value="amigos">Amigos</option>
							<option value="facebook">Facebook</option>
							<option value="google">Google</option>
							<option value="outros">Outros</option>
						</select>
					</label>
					<strong title="Escolha a opção que mais se aproxima a como você conheceu o servidor.">?</strong>
				</p>
			</td>
		</tr>
		
		<?php if (Flux::config('UseCaptcha')): ?>
		<tr>
			<?php if (Flux::config('EnableReCaptcha')): ?>
			<th><label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label></th>
			<td><?php echo $recaptcha ?></td>
			<?php else: ?>
			<th><label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label></th>
			<td>
				<div class="security-code">
					<img src="<?php echo $this->url('captcha') ?>" />
				</div>
				
				<input type="text" name="security_code" id="register_security_code" />
				<div style="font-size: smaller;" class="action">
					<strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
				</div>
			</td>
			<?php endif ?>
		</tr>
		<?php endif ?>
		
		<tr>
			<td></td>
			<td>
				<div style="margin-bottom: 5px">
					<?php printf(Flux::message('AccountCreateInfo2'), 'http://www.rfoo.net/forum/index.php?/topic/2-regras-oficiais-jogo/') ?>
				</div>
				<div>
					<button type="submit"></button>
				</div>
			</td>
		</tr>
	</table>
</form>
       
        <div class="register-art"></div>
                
    </div>
</div>
