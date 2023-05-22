<?php
    function vspa_add_vue_css() {
        $css = '/assets/app/index.css';
        wp_enqueue_style(
            'vspa-vue',
            get_template_directory_uri() . $css,
            array(),
            date( 'Y.m.d.H.i.s', filemtime( get_template_directory() . $css ) )
        );
    }
    add_action( 'wp_enqueue_scripts', 'vspa_add_vue_css' );

    function vspa_add_vue_js() {
        $js = '/assets/app/index.js';
        wp_enqueue_script(
            'vspa-vue',
            get_template_directory_uri() . $js,
            array(),
            date( 'Y.m.d.H.i.s', filemtime( get_template_directory() . $js ) )
        );
    }
    function vspa_add_vue_js_html_attributes( $tag, $handle, $src ) {
        $prefix = 'vspa-vue';
        if ( substr($handle, 0, strlen( $prefix ) ) === $prefix ) {
            return preg_replace( '/(type\s*=\s*["\']).*?(["\'])/', '$1module$2', $tag, 1 );
        }
        return $tag;
    }
    add_filter( 'script_loader_tag', 'vspa_add_vue_js_html_attributes' , 10, 3 );
    add_action( 'wp_enqueue_scripts', 'vspa_add_vue_js' );

    function vspa_extend_rest_api() {
        register_rest_route( 'vue-spa-starter/v1', '/logo', array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => function( $request ) {
                return rest_ensure_response( get_template_directory_uri() . '/assets/logo.svg' );
            },
            'permission_callback' => '__return_true'
          ) );
    }
    add_action( 'rest_api_init', 'vspa_extend_rest_api' );
?>