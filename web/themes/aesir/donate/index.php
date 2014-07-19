<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
	<div class="title">Doação</div>
	<div class="content">
<?php if (Flux::config('AcceptDonations')): ?>
	<?php if (!empty($errorMessage)): ?>
		<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
	<?php endif ?>
	
	<p>O servidor é sustentado através de doações, doando você está ajudando o servidor a manter sua <em>qualidade</em>. Em retorno, você receberá <span class="keyword">créditos de doações</span> que podem ser gastos para comprar itens na loja de itens de doações.</p>
	<h3>Você está pronto para doar?</h3>
	<p>As doações são processadas através do PayPal, não se preocupe! Mesmo que você não tenha uma conta no PayPal, você ainda pode escolher uma das formas de pagamento que o PayPal disponibiliza!</p>
	<p>Caso você queira fazer uma doação via depósito ou lotérica <a href="http://www.rfoo.net/?module=pages&action=content&path=deposito_bancario">clique aqui</a>.</p>
		
	<?php
	$currency         = Flux::config('DonationCurrency');
	$dollarAmount     = (float)+Flux::config('CreditExchangeRate');
	$creditAmount     = 1;
	$rateMultiplier   = 10;
	$hoursHeld        = +(int)Flux::config('HoldUntrustedAccount');
	
	while ($dollarAmount < 1) {
		$dollarAmount  *= $rateMultiplier;
		$creditAmount  *= $rateMultiplier;
	}
	?>
	
	<?php if ($hoursHeld): ?>
		<p>To prevent fraudulent payments, our server currently locks the crediting process for <?php echo number_format($hoursHeld) ?> hours
			after the donation has been made to ensure legitimate gameplay and a healthy PayPal reputation.</p>
		<p>This hold is applied only once for the associated PayPal e-mail and RO account.</p>
	<?php endif ?>

	<div class="generic-form-div" style="margin-bottom: 10px">
		<table class="generic-form-table">
			<tr>
				<th><label>Valor de troca:</label></th>
				<td><p><?php echo $this->formatDollar($dollarAmount) ?> <?php echo htmlspecialchars($currency) ?>
				= <?php echo number_format($creditAmount) ?> credito(s).</p></td>
			</tr>
			<tr>
				<th><label>Doação minima:</label></th>
				<td><p><?php echo $this->formatDollar(Flux::config('MinDonationAmount')) ?> <?php echo htmlspecialchars($currency) ?></p></td>
			</tr>
		</table>
	</div>
		
	<?php if (!$donationAmount): ?>
	<form action="<?php echo $this->url ?>" method="post">
		<?php echo $this->moduleActionFormInputs($params->get('module')) ?>
		<input type="hidden" name="setamount" value="1" />
		<p class="enter-donation-amount">
			<label>
				Digite o valor que você deseja doar:
				<input type="text" name="amount" value="<?php echo htmlspecialchars($params->get('amount')) ?>"
					size="<?php echo (strlen((string)+Flux::config('CreditExchangeRate')) * 2) + 2 ?>" />
				<?php echo htmlspecialchars(Flux::config('DonationCurrency')) ?>
			</label>
		</p>
		<input type="submit" value="Confirmar Doação" class="submit_button" />
	</form>
	<?php else: ?>
	<p>Quando você estiver pronto, clique no botão "Donate" do PayPal para continuar a transação. Caso queira fazer uma doação via <b>depósito bancário</b> <a href="http://www.rfoo.net/?module=pages&action=content&path=deposito_bancario">clique aqui</a>!</p>
		
	<p class="credit-amount-text">
		&mdash;
		<span class="credit-amount"><?php echo number_format(floor($donationAmount / Flux::config('CreditExchangeRate')), 0, Flux::config('MoneyDecimalSymbol'), Flux::config('MoneyThousandsSymbol')) ?></span> credits
		&mdash;
	</p>
		
	<p class="donation-amount-text">Valor:
		<span class="donation-amount">
		<?php echo $this->formatDollar($donationAmount) ?>
		<?php echo htmlspecialchars(Flux::config('DonationCurrency')) ?>
		</span>
	</p>
	<p class="reset-amount-text">
		<a href="<?php echo $this->url('donate', 'index', array('resetamount' => true)) ?>">(Resetar)</a>
	</p>
	<p><?php echo $this->donateButton($donationAmount) ?></p>
	<?php endif ?>
<?php else: ?>
	<p><?php echo Flux::message('NotAcceptingDonations') ?></p>
<?php endif ?>
</div>
</div>