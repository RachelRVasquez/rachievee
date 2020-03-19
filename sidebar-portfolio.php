<?php
/**
 * Portfolio Custom "sidebar"
 * @todo: Make dynamic at some point
 *
 * @package rachievee
 */
$sidebar_about = '';
$sidebar_tech = '';
$sidebar_platforms = '';
$sidebar_linkedin_link = '';
$sidebar_contact_link = '';
$sidebar_github_link = '';
$sidebar_stack_link = '';

if ( get_post_meta( $post->ID, '_wp_page_template', true ) === 'page-portfolio.php' ) {
    $sidebar_about         = get_post_meta( $post->ID, '_port_sidebar_about', true );
    $sidebar_tech          = get_post_meta( $post->ID, '_port_sidebar_tech', true );
    $sidebar_platforms     = get_post_meta( $post->ID, '_port_sidebar_platforms', true );
    $sidebar_linkedin_link = get_post_meta( $post->ID, '_port_sidebar_linkedin', true );
    $sidebar_contact_link  = get_post_meta( $post->ID, '_port_sidebar_contact', true );
    $sidebar_github_link   = get_post_meta( $post->ID, '_port_sidebar_github', true );
    $sidebar_stack_link    = get_post_meta( $post->ID, '_port_sidebar_stack_exchange', true );
} ?>

<aside id="portfolio-sidebar" class="widget-area">
    <?php if( ! empty( $sidebar_about ) ) { ?>
    	<section id="portfolio-about" class="widget">
    		<h2 class="widget-title"><?php echo esc_html( 'About Rachel' ); ?></h4>
            <p><?php echo esc_html( $sidebar_about ); ?></p>
    	</section>
    <?php } ?>
    <?php if( ! empty( $sidebar_tech ) ) { ?>
        <section id="portfolio-tech" class="widget">
            <h2 class="widget-title"><?php echo esc_html( 'Technologies' ); ?></h4>
            <p><?php echo esc_html( $sidebar_tech ); ?></p>
    	</section>
    <?php } ?>
    <?php if( ! empty( $sidebar_platforms ) ) { ?>
    	<section id="portfolio-platforms" class="widget">
    		<h2 class="widget-title"><?php echo esc_html( 'Platforms' ); ?></h4>
            <p><?php echo esc_html( $sidebar_platforms ); ?></p>
    	</section>
    <?php } ?>
    <?php if( ! empty( $sidebar_linkedin_link ) ) { ?>
	       <a href="<?php echo esc_url( $sidebar_linkedin_link ); ?>" class="port-sidebar-link">
               <span aria-hidden="true" class="fab fa-linkedin"></span>
               <?php esc_html_e( 'LinkedIn', 'rachievee' ) ; ?>
           </a>
    <?php } ?>
    <?php if( ! empty( $sidebar_contact_link ) ) { ?>
	       <a href="<?php echo esc_url( $sidebar_contact_link ); ?>" class="port-sidebar-link">
               <span aria-hidden="true" class="fas fa-envelope"></span>
               <?php esc_html_e( 'Contact Rachel', 'rachievee' ) ; ?>
           </a>
    <?php } ?>
    <?php if( ! empty( $sidebar_github_link ) ) { ?>
        <a href="<?php echo esc_url( $sidebar_github_link ); ?>" class="port-sidebar-link">
            <span aria-hidden="true" class="fab fa-github"></span>
            <?php esc_html_e( 'GitHub', 'rachievee') ; ?>
        </a>
    <?php } ?>
    <?php if( ! empty( $sidebar_stack_link ) ) { ?>
        <a href="<?php echo esc_url( $sidebar_stack_link ); ?>" class="port-sidebar-link">
            <span aria-hidden="true" class="fab fa-wordpress-simple"></span>
            <?php esc_html_e( 'Stack Exchange', 'rachievee') ; ?>
        </a>
    <?php } ?>
</aside><!-- #secondary -->
