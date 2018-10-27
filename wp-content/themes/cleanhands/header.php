<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cleanhands
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cleanhands' ); ?></a>

	<?php if ( is_front_page() ): ?>
		<header class="site-header site-header-home" style="background-image:
		url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

	<?php elseif ( is_page_template('page-landing.php') ): ?>
	<header class="site-header site-header-landing" style="background-image:
	url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

	<?php else: ?>

	<header class="site-header">
	<? endif ?>

		<nav class="top-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'top-nav',
				) );
			?>
		</nav>

		<div class="nav-container">
			<div class="nav-items">
				<div class="site-branding">
					<?php
						the_custom_logo();
					?>
				</div>

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'land-for-tomorrow' ); ?></button>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</nav>
			</div>
		</div>

		<?php if( is_page() ): ?>
			<header class="page-header">
				<?php the_title( '<h1 >', '</h1>' ); ?>
				<?php the_subtitle('<h3>', '</h3>'); ?>

				<?php if ( is_front_page() ): ?>
					<a href="donate" class="btn">Donate Now</a>
				<?php endif ?>
			</header><!-- .page-header -->
		<?php endif ?>

	</header>

	<div id="content" class="site-content">
