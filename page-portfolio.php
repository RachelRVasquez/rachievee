<?php
/**
 * Template Name: Portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rachievee
 */

get_header();
get_sidebar();

$get_portfolio_posts = get_posts([
	'post_type' => 'portfolio',
	'orderby'   => 'date',
	'order'     => 'DESC',
]);

$slider_shortcode_id = get_post_meta( $post->ID, '_port_slider_id', true );
?>

	<div id="primary" class="content-area portfolio-content">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

		if ( $get_portfolio_posts && count( $get_portfolio_posts ) > 0 ) {
			foreach ( $get_portfolio_posts as $portfolio ) {
				$port_image = get_the_post_thumbnail( $portfolio->ID );
				$port_post  = get_post( $portfolio->ID );
				$get_technologies = get_the_terms( $portfolio->ID, 'technologies' );
				$tech_list = $get_technologies ? join(', ', wp_list_pluck( $get_technologies, 'name' ) ) : '';
				?>
				<section class="port-section">
					<?php if ( $port_image ) { ?>
						<div class="port-img-wrapper">
							<?php echo $port_image; ?>
						</div>
					<?php } ?>
					<div class="port-content">
						<h3 class="port-title"><?php echo esc_html( get_the_title( $portfolio->ID ) ); ?></h3>
						<p class="port-excerpt"><?php echo get_the_excerpt( $portfolio->ID ); ?></p>
						<?php if ( ! empty( $tech_list ) ) { ?>
							<p class="port-tech-list">
								(<?php echo $tech_list; ?>)
							</p>
						<?php } ?>
						<button class="port-more-btn" name="read-more-portfolio" data-id="<?php echo $portfolio->ID; ?>">
							<?php esc_html_e( 'More about this project', 'rachievee' ); ?>
							<span aria-hidden="true" class="fas fa-angle-double-down"></span>
						</button>
						<div id="port-content-<?php echo $portfolio->ID; ?>" class="port-full">
							<?php if ( isset( $port_post ) && !empty( $port_post ) ) {
								echo wpautop( $port_post->post_content );
							} ?>
						</div>
					</div>
				</section>
			<?php }
		}

		endwhile; // End of the loop. ?>

		<?php if ( isset( $slider_shortcode_id ) && ! empty( $slider_shortcode_id ) ) : ?>
			<section class="metaslider-section">
				<h4 class="metaslider-title"><?php esc_html_e( 'Other Projects', isda_theme ); ?></h4>
				<?php echo do_shortcode('[metaslider id="'. $slider_shortcode_id .'"]'); ?>
			</section>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
