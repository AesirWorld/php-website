<?php
if (!defined('FLUX_ROOT')) exit;
$adminMenuItems = $this->getAdminMenuItems();
$menuItems = $this->getMenuItems();
?>

<?php if (!empty($adminMenuItems) && !Flux::config('AdminMenuNewStyle')): ?>
		<div class="panel-menu">
			<strong>Admin Menu</strong><br/>
		<?php
			foreach ($adminMenuItems as $menuItem) {
				$stdout[] = sprintf('<a href="%s" class="sub-menu-item%s">%s</a>',
							$this->url($menuItem['module'], $menuItem['action']),
							($params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']) ? ' current-sub-menu' : '',
							htmlspecialchars($menuItem['name']));
			}
			echo implode('<br/>', $stdout);
		?>
		</div>
<?php endif ?>

<?php if (!empty($menuItems)): ?>
	<?php foreach ($menuItems as $menuCategory => $menus): ?>
	<?php if(!empty($menus) && $menuCategory != 'Main Menu'): ?>
	<div class="panel-menu">
		<strong><?php echo htmlspecialchars($menuCategory) ?></strong><br/>
	<?php
		unset($stdout);
		foreach ($menus as $menuItem) {
			$stdout[] = sprintf('<a href="%s" class="sub-menu-item%s"%s>%s</a>',
						$menuItem['url'],
						($params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']) ? ' current-sub-menu' : '',
						($menuItem['module'] == 'account' && $menuItem['action'] == 'logout') ? ' onclick="return confirm(\'Are you sure you want to logout?\')"' : '',
						htmlspecialchars($menuItem['name']));
		}
		echo implode('<br/>', $stdout);
	?>
	</div>
	<?php endif ?>
	<?php endforeach ?>
<?php endif ?>
