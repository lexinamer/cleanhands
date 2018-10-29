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
	<div class="footer-nav">
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

	<div class="footer-info">
		Copyright 2018 <?php bloginfo('name'); ?>. All rights reserved.
	</div><!-- .site-info -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
