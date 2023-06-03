<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="<?php
                $favicon_id = (int) get_option( 'site_icon' );
                echo esc_url(
                        $favicon_id?
                            wp_get_attachment_image_url( $favicon_id, 'full' ):
                            get_template_directory_uri() . '/assets/favicon.ico'
                    );
            ?>"/>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>