<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="box3">
	<div class="title">Visualizando <span class="text_highlight3">Carrinho</span></div>
	<div class="content">
<p class="cart-info-text">Você tem <span class="cart-item-count"><?php echo number_format(count($items)) ?></span> item(s) no seu carrinho.</p>
<p class="cart-total-text">O subtotal da sua compra é de <span class="cart-sub-total"><?php echo number_format($total=$server->cart->getTotal()) ?></span> crédito(s).</p>
<br />
<p class="checkout-text"><a href="<?php echo $this->url('purchase', 'checkout') ?>">Proceder para Confirmação de Compra</a></p>
<?php echo $this->moduleActionFormInputs($params->get('module'), $params->get('action')) ?>
<table class="vertical-table cart">
	<?php foreach ($items as $num => $item): ?>
	<tr>
		<?php if (($item->shop_item_use_existing && ($image=$this->itemImage($item->shop_item_nameid))) || ($image=$this->shopItemImage($item->shop_item_id))): ?>
		<td>
			<img src="<?php echo $image ?>?nocache=<?php echo rand() ?>" class="shop-item-image" />
		</td>
		<?php endif ?>
		<td>
			<h4>
				<label>
					<?php echo htmlspecialchars($item->shop_item_name) ?>
				</label>
			</h4>
			<?php if ($item->shop_item_qty > 1): ?>
			<p class="shop-item-qty">Quantidade: <span class="qty"><?php echo number_format($item->shop_item_qty) ?></span></p>
			<?php endif ?>
			<p class="shop-item-cost"><span class="cost"><?php echo number_format($item->shop_item_cost) ?></span> credits</p>
			<p class="shop-item-action">
				<?php if ($auth->actionAllowed('item', 'view')): ?>
					<?php echo $this->linkToItem($item->shop_item_nameid, 'View Item') ?> /
				<?php endif ?>
				<a href="<?php echo $this->url('purchase', 'remove', array('num' => $num)) ?>">Remover do Carrinho</a> /
				<a href="<?php echo $this->url('purchase', 'add', array('id' => $item->shop_item_id, 'cart' => true)) ?>">Adicionar Outro ao Carrinho</a>
			</p>
			<p><?php echo Markdown($item->shop_item_info) ?></p>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<p class="remove-from-cart">
	<button onclick="window.location.href='<?php echo $this->url('purchase', 'clear') ?>'">Esvaziar Carrinho</button>
</p>
</div></div>
