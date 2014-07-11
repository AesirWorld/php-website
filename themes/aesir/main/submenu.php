<?php if (!defined('FLUX_ROOT')) exit; ?>

<?php 
$subMenuItems = $this->getSubMenuItems();
$menus = array();

if(!empty($subMenuItems)) {
?>	
	<div class="box3">
		<div class="title">Sub <span class="text_highlight3">Menu</span></div>
		<div class="content">
<?php
	foreach ($subMenuItems as $menuItem) {
		$menus[] = sprintf('<a href="%s" class="sub-menu-item%s">%s</a>',
					$this->url($menuItem['module'], $menuItem['action']),
					$params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action'] ? ' current-sub-menu' : '',
					htmlspecialchars($menuItem['name']));
	}
	echo implode('<br/>', $menus);
?>
	</div>
<?php
}
?>
