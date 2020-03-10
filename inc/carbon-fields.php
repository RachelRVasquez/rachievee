<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

if ( ! class_exists( Rachievee_Carbon_Fields ) ) {
    class Rachievee_Carbon_Fields {
        function init(){
            add_action( 'carbon_fields_register_fields', [ $this, 'portfolio_sidebar_fields' ] );
        }

        function portfolio_sidebar_fields(){
            Container::make( 'post_meta', __( 'Portfolio Sidebar', 'rachievee' ) )
                ->where( 'post_type', '=', 'page' )
                ->where( 'post_template', '=', 'page-portfolio.php' )
                ->add_fields( array(
                    Field::make( 'html', 'port_sidebar_admin_desc' )->set_html( '<p>Populate content for the portfolio page sidebar.</p>' ),
                    Field::make( 'textarea', 'port_sidebar_about', __( 'About Blurb:' ) ),
                    Field::make( 'textarea', 'port_sidebar_tech', __( 'Tech or Skillset Blurb:' ) ),
                    Field::make( 'textarea', 'port_sidebar_platforms', __( 'Platforms or CMS\':' ) ),
                    Field::make( 'text', 'port_sidebar_linkedin', __( 'LinkedIn Link:' ) ),
                    Field::make( 'text', 'port_sidebar_contact', __( 'Contact Link:' ) ),
                    Field::make( 'text', 'port_sidebar_github', __( 'Github Link:' ) ),
                    Field::make( 'text', 'port_sidebar_stack_exchange', __( 'Stack Exchange Link:' ) ),
                )
            );
        }
    }
}
