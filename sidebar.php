<?php
/**
 * Main sidebar template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */ ?>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<aside id="sidebar" class="clearfix">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #sidebar -->
<?php endif; ?>