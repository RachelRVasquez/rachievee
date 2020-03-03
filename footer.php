<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rachievee
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-footer-inner">
			<div class="site-info">
				<?php echo esc_html( 'RachieVee', 'rachievee' ); ?>
				<span aria-hidden="true">&copy;</span>
				<?php echo date( 'Y' ); ?>
			</div><!-- .site-info -->
			<ul id="footer-menu" class="menu">
				<li class="menu-item">
					<a href="https://twitter.com/RachelRVasquez">
						<span aria-hidden="true" class="fab fa-twitter-square">
						<span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'rachievee' ); ?></span>
					</a>
				</li>
				<li class="menu-item">
					<a href="http://www.linkedin.com/pub/rachel-vasquez/30/a62/4a0/">
						<span aria-hidden="true" class="fab fa-linkedin">
						<span class="screen-reader-text"><?php esc_html_e( 'LinkedIn', 'rachievee' ); ?></span>
					</a>
				</li>
				<li class="menu-item">
					<a href="https://github.com/RachelRVasquez/">
						<span aria-hidden="true" class="fab fa-github-square">
						<span class="screen-reader-text"><?php esc_html_e( 'Github', 'rachievee' ); ?></span>
					</a>
				</li>
				<li class="menu-item">
					<a href="https://profiles.wordpress.org/rachievee/">
						<span aria-hidden="true" class="fab fa-wordpress">
						<span class="screen-reader-text"><?php esc_html_e( 'WordPress.org Profile', 'rachievee' ); ?></span>
					</a>
				</li>
			</ul>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
