<?php
/**
 * Homepage Content template part.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php if ( get_the_content() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="home-content entry clearfix">
			<?php the_content(); ?>
		</section><!-- .home-content -->
	<?php endwhile; ?>
<?php endif; ?>