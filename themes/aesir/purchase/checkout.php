<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="box3">
	<div class="title">Retirada</span></div>
	<div class="content">
<p>O processo de compra é realmente simples, após a confirmação da compra seus itens serão entregues no NPC <span class="keyword">Entregadora</span> localizado em prontera.</p>

<h3>Informações de Compra</h3>
<p class="cart-total-text">O subtotal do seu carrinho é de <span class="cart-sub-total"><?php echo number_format($total=$server->cart->getTotal()) ?></span> crédito(s).</p>
<p class="checkout-info-text">Seu saldo após a compra será <span class="remaining-balance"><?php echo number_format($session->account->balance - $total) ?></span> crédito(s).</p>
<p>Após conferir a informação do item abaixo, você pode prosseguir para confirmação da compra clicando em "Confirmar Compra".</p>
<p>
	<form action="<?php echo $this->url ?>" method="post">
		<?php echo $this->moduleActionFormInputs($params->get('module'), 'checkout') ?>
		<input type="hidden" name="process" value="1" />
		<button type="submit" onclick="return confirm('Você tem certeza que quer continuar comprando os item(s) abaixo?')">
			<strong>Confirmar Compra</strong>
		</button>
	</form>
</p>

<h3>Itens atualmente no seu carrinho:</h3>
<p class="cart-info-text">Você tem <span class="cart-item-count"><?php echo number_format(count($items)) ?></span> item(s) no seu carrinho.</p>
<table class="vertical-table cart">
	<?php foreach ($items as $item): ?>
	<tr>
		<?php if (($item->shop_item_use_existing && ($image=$this->itemImage($item->shop_item_nameid))) || ($image=$this->shopItemImage($item->shop_item_id))): ?>
		<td>
			<img src="<?php echo $image ?>?nocache=<?php echo rand() ?>" class="shop-item-image" />
		</td>
		<?php endif ?>
		<td>
			<h4>
				<?php if ($auth->actionAllowed('item', 'view')): ?>
					<?php echo $this->linkToItem($item->shop_item_nameid, $item->shop_item_name) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($item->shop_item_nameid) ?>
				<?php endif ?>
			</h4>
			<?php if ($item->shop_item_qty > 1): ?>
			<p class="shop-item-qty">Quantidade: <span class="qty"><?php echo number_format($item->shop_item_qty) ?></span></p>
			<?php endif ?>
			<p class="shop-item-cost"><span class="cost"><?php echo number_format($item->shop_item_cost) ?></span> crédito(s)</p>
			<p><?php echo Markdown($item->shop_item_info) ?></p>
		</td>
	</tr>
	<?php endforeach ?>
</table>
</div></div>
