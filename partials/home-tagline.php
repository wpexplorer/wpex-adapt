<?php
/**
 * Homepage tagline template part.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Display tagline
if ( get_bloginfo( 'description' ) ) : ?>
	<section id="home-tagline">
		<?php echo bloginfo( 'description' ); ?>
	</section><!-- #home-tagline -->
<?php endif; ?>