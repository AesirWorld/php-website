<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="box3">
	<div class="title">Painel <span class="text_highlight">de Controle</span></div>
	<div class="content">

<?php if ($session->isLoggedIn()): ?>

	<?php include('sidebar.php'); ?>

<?php else: ?>

<?php if ($auth->actionAllowed('account', 'create')): ?>
<p><?php printf(Flux::message('LoginPageMakeAccount'), $this->url('account', 'create')); ?></p>
<?php endif ?>

<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
	<input type="hidden" name="server" value="<?php echo $serverNames[0] ?>">
	<table>
		<tr>
			<th><label for="login_username">Login</label></th>
			<td><input type="text" name="username" id="login_username" value="<?php echo htmlspecialchars($params->get('username')) ?>" /></td>
		</tr>
		<tr>
			<th><label for="login_password">Senha</label></th>
			<td><input type="password" name="password" id="login_password" /></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>" />
			</td>
		</tr>
	</table>
</form>

<?php endif ?>
</div>
