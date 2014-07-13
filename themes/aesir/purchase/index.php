<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="box3">
	<div class="title"><?php echo htmlspecialchars(Flux::message('StoreLabel')) ?></div>
	<div class="content">
<p>Os itens nesta loja são comprados utilizando seus <span class="keyword">créditos de doação</span>.  Estes créditos podem ser obetidos <a href="<?php echo $this->url('donate') ?>">fazendo uma doação para o servidor</a>.</p>
<h2>Loja do <span class="shop-server-name"><?php echo htmlspecialchars($server->serverName) ?></span></h2>
<p class="action">
	<a href="<?php echo $this->url('purchase', 'index') ?>"<?php if (is_null($category)) echo ' class="current-shop-category"' ?>>
		<?php echo htmlspecialchars(Flux::message('AllLabel')) ?> (<?php echo number_format($total) ?>)
	</a>
<?php foreach ($categories as $catID => $catName): ?>
	/
	<a href="<?php echo $this->url('purchase', 'index', array('category' => $catID)) ?>"<?php if (!is_null($category) && $category === (string)$catID) echo ' class="current-shop-category"' ?>>
		<?php echo htmlspecialchars($catName) ?> (<?php echo number_format($categoryCount[$catID]) ?>)
	</a>
<?php endforeach ?>
</p>
<?php if ($categoryName): ?>
<h3>Categorias: <?php echo htmlspecialchars($categoryName) ?></h3>
<?php endif ?>
<?php if ($items): ?>
<?php
$evens = array();
$odds  = array();
foreach ($items as $i => $item) {
	if (!($i % 2)) {
		$evens[] = $item;
	}
	else {
		$odds[] = $item;
	}
}
?>

<?php if ($session->isLoggedIn()): ?>
	<?php if ($cartItems=$server->cart->getCartItemNames()): ?><p class="cart-items-text">Items no seu carrinho: <span class="cart-item-name"><?php echo implode('</span>, <span class="cart-item-name">', array_map('htmlspecialchars', $cartItems)) ?></span>.</p><?php endif ?>
	<p class="cart-info-text">Você possui <span class="cart-item-count"><?php echo number_format(count($cartItems)) ?></span> item(s) no seu carrinho.</p>
	<p class="cart-total-text">O subtotal do seu carrinho é de <span class="cart-sub-total"><?php echo number_format($server->cart->getTotal()) ?></span> crédito(s).</p>
<?php endif ?>

<table class="shop-table">
	<tr>
		<td width="50%">
			<?php foreach ($evens as $i => $item): ?>
				<div class="shop-item <?php echo (!($i % 2) ? 'even' : 'odd') ?>">
					<table>
						<tr>
							<?php if (($item->shop_item_use_existing && ($image=$this->itemImage($item->shop_item_nameid))) || ($image=$this->shopItemImage($item->shop_item_id))): ?>
							<td>
								<img src="<?php echo $image ?>?nocache=<?php echo rand() ?>" class="shop-item-image" />
							</td>
							<?php endif ?>
							<td>
								<h4 class="shop-item-name"><?php echo htmlspecialchars($item->shop_item_name) ?></h4>
								<?php if ($item->shop_item_qty > 1): ?>
								<p class="shop-item-qty">Quantidade: <span class="qty"><?php echo number_format($item->shop_item_qty) ?></span></p>
								<?php endif ?>
								<p class="shop-item-cost"><span class="cost"><?php echo number_format($item->shop_item_cost) ?></span> créditos</p>
								<p class="shop-item-info"><?php echo Markdown($item->shop_item_info) ?></p>
								<p class="shop-item-action">
									<?php if ($auth->actionAllowed('purchase', 'add')): ?>
									<a href="<?php echo $this->url('purchase', 'add', array('id' => $item->shop_item_id)) ?>"><strong>Adicionar ao Carrinho</strong></a>
									<?php endif ?>
									<?php if ($auth->actionAllowed('item', 'view')): ?>
									/ <?php echo $this->linkToItem($item->shop_item_nameid, 'View Item') ?>
									<?php endif ?>
									<?php if ($auth->allowedToEditShopItem): ?>
									/ <a href="<?php echo $this->url('itemshop', 'edit', array('id' => $item->shop_item_id)) ?>">Modificar</a>
									<?php endif ?>
									<?php if ($auth->allowedToDeleteShopItem): ?>
									/ <a href="<?php echo $this->url('itemshop', 'delete', array('id' => $item->shop_item_id)) ?>"
										onclick="return confirm('Are you sure you want to remove this item from the item shop?')">Deletar</a>
									<?php endif ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
			<?php endforeach ?>
		</td>

		<td width="50%">
			<?php foreach ($odds as $i => $item): ?>
				<div class="shop-item <?php echo (!($i % 2) ? 'even' : 'odd') ?>">
					<table>
						<tr>
							<?php if (($item->shop_item_use_existing && ($image=$this->itemImage($item->shop_item_nameid))) || ($image=$this->shopItemImage($item->shop_item_id))): ?>
							<td>
								<img src="<?php echo $image ?>?nocache=<?php echo rand() ?>" class="shop-item-image" />
							</td>
							<?php endif ?>
							<td>
								<h4 class="shop-item-name"><?php echo htmlspecialchars($item->shop_item_name) ?></h4>
								<?php if ($item->shop_item_qty > 1): ?>
								<p class="shop-item-qty">Quantity: <span class="qty"><?php echo number_format($item->shop_item_qty) ?></span></p>
								<?php endif ?>
								<p class="shop-item-cost"><span class="cost"><?php echo number_format($item->shop_item_cost) ?></span> credits</p>
								<p class="shop-item-info"><?php echo Markdown($item->shop_item_info) ?></p>
								<p class="shop-item-action">
									<?php if ($auth->actionAllowed('purchase', 'add')): ?>
									<a href="<?php echo $this->url('purchase', 'add', array('id' => $item->shop_item_id)) ?>"><strong>Add to cart</strong></a>
									<?php endif ?>
									<?php if ($auth->actionAllowed('item', 'view')): ?>
									/ <?php echo $this->linkToItem($item->shop_item_nameid, 'View Item') ?>
									<?php endif ?>
									<?php if ($auth->allowedToEditShopItem): ?>
									/ <a href="<?php echo $this->url('itemshop', 'edit', array('id' => $item->shop_item_id)) ?>">Modify</a>
									<?php endif ?>
									<?php if ($auth->allowedToDeleteShopItem): ?>
									/ <a href="<?php echo $this->url('itemshop', 'delete', array('id' => $item->shop_item_id)) ?>"
										onclick="return confirm('Are you sure you want to remove this item from the item shop?')">Delete</a>
									<?php endif ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
			<?php endforeach ?>
		</td>
	</tr>
</table>
<?php else: ?>
<p>The store is empty.</p>
<?php endif ?>
</div></div>
