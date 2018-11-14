<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cleanhands
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<footer class="site-footer">
	<div class="footer-nav container">
		<div class="footer-col">
			<?php dynamic_sidebar('footer-1'); ?>
		</div>

		<div class="footer-col">
			<?php dynamic_sidebar('footer-2'); ?>
		</div>

		<div class="footer-col">
			<?php dynamic_sidebar('footer-3'); ?>
		</div>

		<div class="footer-col">
			<?php dynamic_sidebar('footer-4'); ?>
		</div>

		<div class="footer-col footer-col-last">
			<?php dynamic_sidebar('footer-5'); ?>
		</div>
	</div><!-- #colophon -->

	<div class="footer-info container">
		<div>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-3',
					'menu_id'        => 'social-menu',
				) );
			?>

			<p>Copyright 2018. Clean Hands for Haiti is a partnership with A&M Sports Organization. We are a 501(c)3 organization.</p>
		</div>

		<div>
			<a href="/privacy-policy">Privacy Policy</a> |
			<a href="#">Get our Emails</a>
		</div>
	</div><!-- .site-info -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
