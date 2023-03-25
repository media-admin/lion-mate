<!DOCTYPE html>
<html class="outer-html" lang='de' <?php language_attributes(); ?>>
	<head>

		<!-- Meta Data -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="content-type" content="text/html; charset=macintosh" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scaleable=no">
		<meta name="keywords" content="Lion Mate lion-mate.at">

		<!-- === FAVICONS === -->

		<!-- Default -->
		<link rel="icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon.svg" type="image/x-icon">
		<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon.ico" type="image/x-icon">

		<!-- PNG icons with different sizes -->
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon-16x16.png" sizes="16x16">

		<!-- Apple Touch Icons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-180x180.png">
		<link rel="apple-touch-icon" sizes="192x192" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/apple-touch-icon-192x192.png">

		<!-- Apple macOS Safari Mask Icon -->
		<link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/favicon.svg" color="#B6274F">

		<!-- Apple iOS Safari Theme -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#B6933D">
		<meta name="apple-mobile-web-app-title" content="Lion Mate - Energy Beyond Standards">
		<meta name="apple-mobile-web-app-capable" content="yes">

		<!-- Microsoft Windows Tiles -->
		<meta name="theme-color" content="#B6933D">
		<meta name="msapplication-navbutton-color" content="#525050">
		<meta name="msapplication-TileColor" content="#B6274F">
		<meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/windows-tile-icon-144x144.png">
		<meta name="application-name" content="Lion Mate - Energy Beyond Standards">

		<!-- Internet Explorer 11 Tiles -->
		<meta name="msapplication-square70x70logo" content="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/ms-ie11-icon-70x70.png">
		<meta name="msapplication-square150x150logo" content="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/ms-ie11-icon-150x150.png">
		<meta name="msapplication-wide310x150logo" content="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/ms-ie11-icon-310x150.png">
		<meta name="msapplication-square310x310logo" content="<?php echo esc_url( get_template_directory_uri()); ?>/assets/favicon/ms-ie11-icon-310x310.png">

		<!-- Open Graph -->
		<meta property="og:title" content="Lion Mate - Energy Beyond Standards">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://www.lion-mate.at">
		<meta property="og:image" content="og_image_url">
		<meta property="og:site_name" content="Lion Mate - Energy Beyond Standards">
		<meta property="og:locale" content="de_AT">

		<!-- Site Title -->
		<?php if (is_front_page() ) : ?>
			<title>Startseite | <?php bloginfo( 'name' ); ?></title>
		<?php else : ?>
			<title><?php wp_title($sep = ''); ?> | <?php bloginfo( 'name' ); ?></title>
		<?php endif; ?>

		<?php wp_enqueue_script('jquery'); ?>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class( 'site-body' ); ?>>

		<header class="site-header-top">
			<div class="site-header-top__order">
				<a class="site-header-top__order-btn" href="/onlinebestellung">Bestellen</a>
			</div>

			<div class="site-header-top__email">
					<a class="site-header-top__email-link" href="mailto:info@lion-mate.at">info@lion-mate.at</a>
			</div>

			<div class="site-header-top__social-media-container">
				<ul class="site-header-top__social-media-accounts">
					<li class="site-header-top__facebook">
						<a href="#" target="_blank"><img
								class="site-header-top__facebook-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_facebook-gray.svg"
								alt="Facebook Icon"
							/>
						</a>
					</li>
					<li class="site-header-top__instagram">
						<a href="https://www.instagram.com/lionmate.at/" target="_blank"><img
								class="site-header-top__instagram-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_instagram-gray.svg"
								alt="Instagram Icon"
							/>
						</a>
					</li>
					<li class="site-header-top__linkedin">
						<a href="https://www.linkedin.com/company/lion-mate-e-u/" target="_blank"><img
								class="site-header-top__linkedin-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_linkedin-gray.svg"
								alt="LinkedIn Icon"
							/>
						</a>
					</li>
					<li class="site-header-top__tiktok">
						<a href="https://www.tiktok.com/@lion_mate_energy" target="_blank"><img
								class="site-header-top__tiktok-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_tiktok-gray.svg"
								alt="TikTok Icon"
							/>
						</a>
					</li>
				</ul>
			</div>
		</header>

		<header class="site-header">
			<div class="site-header__wrapper">
				<!-- Header Logo -->
				<div class="site-header__branding">
					<div class="site-header__logo">
						<a class="header-logo__link wrapper" href="<?php echo get_home_url(); ?>">
							<img
								class="site-header__logo-img"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logos/logo_lion-mate-landscape.svg"
								alt="Logo Mate"
							/>
							<img
								class="site-header__logo-img--desktop"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logos/logo_lion-mate-portrait.svg"
								alt="Logo Lion Mate"
							/>
						</a>
					</div>
				</div>

				<div class="site-header__nav-container">
					<!-- Cart on Mobile -->
					<div class="site-header__cart-button">
						<a class="site-header__cart-link" href="/onlinebestellung">
						<img
							class="site-header__cart-icon"
							src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_cart-gold.svg"
							alt="Icon Einkaufswagen"
						/>
					</a>
					</div>

					<!-- Hamburger Menu Toggle -->
					<nav class="main-navigation">
						<div class="site-menu">
							<div class="burger-menu">
								<span class="line"></span>
								<span class="line"></span>
								<span class="line"></span>
							</div>
						</div>

						<!-- Main Navigation -->
						<div class="navbar">
							<ul class="navbar__navigation-list">
								<?php
									$defaults = array(
										'walker'         => new Custom_Navwalker(),
										'menu'           => 'Hauptnavigation',
										'theme_location' => 'nav-menu-main',
										'depth'          => 1,
										'container'      => FALSE,
										'container_class'   => '',
										'menu_class'     => '',
										'items_wrap'     => '%3$s',
										'fallback_cb'		=>	'NavWalker::fallback'
									);
									wp_nav_menu( $defaults );
								?>
							</ul>
						</div>

					</nav>
				</div>
			</div>
		</header>


		<div class="large-hero">

			<?php
				$image_desktop = get_field('pages_img-desktop');
				$image_smartphone = get_field('pages_img-smartphone');

				if( !empty( $image_desktop ) ): ?>
					<img class="large-hero__img large-hero__img--desktop lazyload" src="<?php echo esc_url($image_desktop['url']); ?>" alt="<?php echo esc_attr(v['alt']); ?>" />
				<?php endif;

				if( !empty( $image_smartphone ) ): ?>
					<img class="large-hero__img large-hero__img--smartphone lazyload" src="<?php echo esc_url($image_smartphone['url']); ?>" alt="<?php echo esc_attr(v['alt']); ?>" />
				<?php endif; ?>


			<div class="large-hero__text">
				<h1 class="">
					<?php the_title();?>
				</h1>
			</div>
		</div>

		<div class="contact-navbar">
			<div class="contact-navbar__wrapper">
				<a class="contact-navbar__item contact-navbar__item--mail" href="mailto:info@lion-mate.at"
					>info@lion-mate.at</a
				>

				<ul class="contact-navbar__social-media-accounts">
					<li class="contact-navbar__facebook">
						<a class="contact-navbar__facebook-link" href="#" target="_blank"><img
								class="contact-navbar__facebook-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_facebook-white.svg"
								alt="Facebook Icon"
							/>
						</a>
					</li>
					<li class="contact-navbar__instagram">
						<a class="contact-navbar__instagram-link" href="https://www.instagram.com/lionmate.at/" target="_blank"><img
								class="contact-navbar__instagram-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_instagram-white.svg"
								alt="Instagram Icon"
							/>
						</a>
					</li>
					<li class="contact-navbar__linkedin">
						<a class="contact-navbar__linkedin-link" href="https://www.linkedin.com/company/lion-mate-e-u/" target="_blank"><img
								class="contact-navbar__linkedin-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_linkedin-white.svg"
								alt="LinkedIn Icon"
							/>
						</a>
					</li>
					<li class="contact-navbar__tiktok">
						<a class="contact-navbar__tiktok-link" href="https://www.tiktok.com/@lion_mate_energy" target="_blank"><img
								class="contact-navbar__tiktok-icon"
								src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/icons/icon_tiktok-white.svg"
								alt="TikTok Icon"
							/>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<main class="site-main">
			<div class="site-content">
				<div class="inner__container">
					<h2 class="site-content__intro-heading">
						<?php the_field("pages_subheading"); ?>
					</h2>







