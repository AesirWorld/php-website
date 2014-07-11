<?php if (!defined('FLUX_ROOT')) exit;?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="icon" type="image/png" href="<?php echo $this->themePath('images/favicon.png') ?>" />
		<link rel="stylesheet" href="<?php echo $this->themePath('global.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<!--[if IE]>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<![endif]-->
		<!--[if lt IE 7]>
		<script src="<?php echo $this->themePath('js/ie7.js') ?>" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitpngfix.js') ?>"></script>
		<![endif]-->
		<!--<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.dropshadow.js') ?>"></script>-->
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>

		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

		<script type="text/javascript">
        $(document).ready(function () {

            var showTabbedMenu = function (event) {
                $('.login .display').hide(300);
                $('.login .panel').show(300);

                event.stopPropagation();
                return false;
            }

            var hideTabbedMenu = function (event) {
                $('.login .panel').hide(300);
                $('.login .display').show(300);
            }

            $('.login .panel').hide();

            $('.login .display').on('click', showTabbedMenu);

            if (!$('.login').hasClass('clicking')) { //not have
                $('.login .display').mouseenter(showTabbedMenu);
                $('.login .panel').mouseleave(hideTabbedMenu);
            }

            $('.login .panel').click(function (event) {
                event.stopPropagation();
                return true;
            });

            $(document).on('click', hideTabbedMenu);

            /* Sub menu */
            var showSubMenu = function (event) {
                var submenu = $(this).data('sub-menu');
                console.log("#sub-menu-" + submenu);
                $('.top .login .panel .sub-menu').stop(true, true).hide(150);
                $("#sub-menu-" + submenu).stop(true, true).show(150);

                event.stopPropagation();
                return true;
            }

            var hideSubMenu = function (event) {
                $(this).hide(150);
            }

            $('.top .login .panel .sub-menu').hide();
            $('.top .login .panel > a').on('click', showSubMenu);
            $('.top .login .panel > a').mouseenter(showSubMenu);
            $('.top .login .panel .sub-menu').mouseleave(hideSubMenu);

            /* Check if theres a request to hide right or left container */
            var left   = $('.middle .container > .left');
            var middle = $('.middle .container > .middle');
            var right  = $('.middle .container > .right');

            if( $('.hide_right_container').length ) {
                var new_width = middle.width() + right.width() + parseInt(right.css('padding-left')) + parseInt(right.css('padding-right'));
                right.hide();
                middle.width(new_width);
            }
            if( $('.hide_left_container').length ) {
                var new_width = middle.width() + left.width() + parseInt(left.css('padding-left')) + parseInt(left.css('padding-right'));
                left.hide();
                middle.width(new_width);
            }
        });
		</script>
		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}

			// Preload spinner image.
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

			function refreshSecurityCode(imgSelector){
				$(imgSelector).attr('src', spinner.src);

				// Load image, spinner will be active until loading is complete.
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();

				$(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm()
			{
				//$('.search-form').toggle();
				$('.search-form').slideToggle('fast');
			}
		</script>

		<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
		<script type="text/javascript">
			 var RecaptchaOptions = {
			    theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
			 };
		</script>
		<?php endif ?>
	</head>
<body>

	<div class="top">
		<div class="menu">
			<?php
			$menuItems = $this->getMenuItems();
			foreach($menuItems['Main Menu'] as $item)
				echo sprintf('<a href="%s">%s</a>', $item['url'], htmlspecialchars($item['name']));
			?>
		</div>

        <?php if (! $session->isLoggedIn()): ?>
		<div class="login clicking">
			<div class="display">Login</div>
			<div class="panel border-radius">
		  		<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
					<input type="hidden" name="server" value="FluxRO">
					<input type="text" name="username" placeholder="Usuário..." />
					<input type="password" name="password" placeholder="Senha..." />
                    <div class="forgot">esqueceu sua senha?</div>
                    <input type="submit" value="entrar" />
                    <input type="button" value="cadastrar" />
			  	</form>
			</div>
	  	</div>
        <?php else: ?>
        <?php
        $menuItems = $this->getMenuItems();
        $adminMenuItems = $this->getAdminMenuItems();

        $stdout = "";
        $submenuID = 0;

        if (!empty($menuItems)) {
            foreach ($menuItems as $menuCategory => $menus) {
                if(empty($menus) || $menuCategory == 'Main Menu') continue;

                $stdout .= "<strong>".htmlspecialchars($menuCategory)."</strong>";
                foreach ($menus as $menuItem) {
                    $stdout .= sprintf('<a href="%s" class="%s" data-sub-menu="%s">%s</a>',
                                        $menuItem['url'],
                                        ($params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']) ? 'current' : '',
                                        $submenuID,
						htmlspecialchars($menuItem['name']));

                    $subMenuItems = $this->getSubMenuItems($menuItem['module']);

                    if(!empty($subMenuItems) && $menuItem['action'] != 'logout') {
                        $stdout .= '<div class="sub-menu" id="sub-menu-'.$submenuID.'">';
                        foreach ($subMenuItems as $subMenuItem) {
                            $stdout .= sprintf('<a href="%s">%s</a>',
                                        $this->url($subMenuItem['module'], $subMenuItem['action']),
                                        htmlspecialchars($subMenuItem['name']));
                        }
                        $stdout .= '</div>';
                    }

                    $submenuID++;
                }
            }
        }

        $stdout2 = "";
        if (!empty($adminMenuItems)) {
            $stdout2 .= "<strong>Administração</strong>";
			foreach ($adminMenuItems as $menuItem) {
				$stdout2 .= sprintf('<a href="%s" class="%s" data-sub-menu="%s">%s</a>',
							$this->url($menuItem['module'], $menuItem['action']),
							($params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']) ? ' current' : '',
                            $submenuID,
							htmlspecialchars($menuItem['name']));

                $subMenuItems = $this->getSubMenuItems($menuItem['module']);

                if(!empty($subMenuItems)) {
                    $stdout2 .= '<div class="sub-menu" id="sub-menu-'.$submenuID.'">';
                    foreach ($subMenuItems as $subMenuItem) {
                        $stdout2 .= sprintf('<a href="%s">%s</a>',
                                    $this->url($subMenuItem['module'], $subMenuItem['action']),
                                    htmlspecialchars($subMenuItem['name']));
                    }
                    $stdout2 .= '</div>';
                }

                $submenuID++;
			}
        }
	   ?>
		<div class="login">
			<div class="display"><?php echo htmlspecialchars(Flux::message('CPLabel')) ?></div>
			<div class="panel border-radius">
                <?php echo $stdout2; ?>
                <?php echo $stdout; ?>
			</div>
	  	</div>
        <?php endif; ?>

		<div class="logo"></div>
	</div>

	<div class="middle">

<!--
		<div class="slider">
			<div class="container">
				<div class="baixe"></div>
				<div class="registre"></div>
				<div class="intereja"></div>
			</div>
			<div class="slides">
				<div class="navs"></div>
				<div class="decoration"></div>
				<img alt="" src="http://aesir.g1x.me/images/slides/1.png" />
			</div>
		</div>
-->
		<div class="container">
			<div class="left">
				<div style="height:85px; font-size:18px;">
					<div style="float:left; margin:10px 15px;">
						<div style="margin:10px 0px">SERVER:<div class="status"></div></div>
						<div style="margin:10px 0px">STAFF:<div class="status"></div></div>
					</div>
					<div style="float:right; text-align:right; margin:20px 15px;">
						<div style="font-size:13px; margin-right:3px;">Players:</div>
						<div style="font-style:bold; font-size:40px;" class="HelveticaB">1961</div>
					</div>
				</div>

                <?php include('main/ranking.php'); ?>

				<div class="box2 woe">
					<div class="title">Woe</div>
					<div class="content">
					  <div class="woe-info">
						<span class="day"><?php echo htmlspecialchars(Flux::message('DayOfWeekMonday')) ?></span><br/>
						<span class="hour">19~20h</span>
					  </div>
					  <div class="woe-info">
						<span class="day"><?php echo htmlspecialchars(Flux::message('DayOfWeekWednesday')) ?></span><br/>
						<span class="hour">19~20h</span>
					  </div>
					  <div class="woe-info">
						<span class="day"><?php echo htmlspecialchars(Flux::message('DayOfWeekSunday')) ?></span><br/>
						<span class="hour">19~20h</span>
					  </div>
					</div>
				</div>

			</div>


			<div class="middle">
