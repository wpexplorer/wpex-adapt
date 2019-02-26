<?php
/**
 * The Footer for our theme.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 3.0.1
 */ ?>

</div><!-- /main -->

	<div id="footer" class="clearfix">
		<?php
		// Display footer widgets if enabled
		if ( '1' == wpex_get_data( 'widgetized_footer', '1' ) ) : ?>
			<div id="footer-widget-wrap" class="wpex-row wpex-clr">
				<div id="footer-one" class="wpex-col wpex-col-4 clearfix">
					<?php dynamic_sidebar( 'footer-one' ); ?>
				</div><!-- #footer-one -->
				<div id="footer-two" class="wpex-col wpex-col-4 clearfix">
					<?php dynamic_sidebar( 'footer-two' ); ?>
				</div><!-- #footer-two -->
				<div id="footer-three" class="wpex-col wpex-col-4 clearfix">
					<?php dynamic_sidebar( 'footer-three' ); ?>
				</div><!-- #footer-three -->
				<div id="footer-four" class="wpex-col wpex-col-4 clearfix">
					<?php dynamic_sidebar( 'footer-four' ); ?>
				</div><!-- #footer-four -->
			</div><!-- #footer-widget-wrap -->
		<?php endif; ?>
		<div id="footer-bottom" class="clearfix">
			<div id="copyright">
				<?php
				// Display custom copyright text
				if ( $footer_text = wpex_get_data( 'footer_text' ) ) : ?>
					<?php echo do_shortcode( wp_kses_post( $footer_text ) ); ?>
				<?php
				// Display link to WPExplorer and WordPress if custom copyright isn't defined
				// I would request you keep a link back to WPExplorer.com to show your appreciation
				// Of course this is 100% optional - thanks!
				else : ?>
					WordPress Theme by <a href="http://www.wpexplorer.com/adapt-free-responsive-wordpress-theme/" title="Adapt Wordpress Theme" target="_blank">WPExplorer</a> Powered by <a href="https://wordpress.org/" title="WordPress" target="_blank">WordPress</a>
				<?php endif; ?>
			</div><!-- /copyright -->
			<div id="back-to-top">
				<a href="#toplink" class="scroll-top" title="<?php _e( 'Scroll Up', 'wpex-adapt' ); ?>"><?php _e( 'Scroll Up', 'wpex-adapt' ); ?> &uarr;</a>
			</div><!-- #back-to-top -->
		</div><!-- #footer-bottom -->
	</div><!-- #footer -->

</div><!-- #wrap --> 

<?php wp_footer(); ?>
</body>
</html>