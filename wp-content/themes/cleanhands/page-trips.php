<?php
/**
 * Template Name: Our Trips
 */

get_header();
?>


	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<? the_content(); ?>

			<?php
					// Custom Post Query
				 $args = array (
						 'post_type'=> 'our_trips',
				 );

				 $the_query = new WP_Query($args);

				 while( $the_query->have_posts() ) : $the_query->the_post();
		 	?>

					<!-- Post Content goes here -->
					<?php get_template_part( 'template-parts/content', get_post_type() );?>

				<?php endwhile; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
