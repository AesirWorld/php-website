<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php $menus = array() ?>
<?php if (!empty($pageMenuItems)): ?>

	<div class="box3">
		<div class="title">Menu <span class="text_highlight2">da Página</span></div>
		<div class="content">

	<div id="pagemenu"><?php echo empty($title) ? 'Actions for this page' : htmlspecialchars($title) ?>:
	<?php foreach ($pageMenuItems as $menuItemName => $menuItemLink): ?>
		<?php $menus[] = sprintf('<br/><a href="%s" class="page-menu-item">%s</a>', $menuItemLink, htmlspecialchars($menuItemName)) ?>
	<?php endforeach ?>
	<?php echo implode($menus) ?>
	</div>
	
	</div>
<?php endif ?>
