<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Twenty7_Degrees_North
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function twentyseven_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyseven_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function twentyseven_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'twentyseven_theme_pingback_header' );

function allow_iframe_inclusion() {
    // Remove the X-Frame-Options header as it's limited in functionality
    header_remove('X-Frame-Options');

    // Allow iframe embedding on both your production domain and localhost
    // Note: You might need to specify the port number for localhost if you're using one (e.g., 'localhost:3000')
    header("Content-Security-Policy: frame-ancestors 'self' https://blog.davidmc.io");
}
add_action('send_headers', 'allow_iframe_inclusion');

function add_cors_headers() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Replace * with your specific allowed origins or use *
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 3600");
    }
}

add_action('init', 'add_cors_headers');

add_action( 'admin_footer', function() {
    ?>
        <style>#wp-admin-bar-tm-suspend,#wp-admin-bar-rank-math,#wp-admin-bar-wp-rest-cache-clear,#wp-admin-bar-updraft_admin_node{display:none!important;}</style>
        <style>
            .form-wrap p, p.description, p.help, span.description {
                font-weight: normal;
            }
            .acf-field {
                margin-top: 0 !important;
            }
            body.uip-user-frame {
                overflow-y: scroll !important;
            }
        </style>
        <script>
            jQuery('.acf-field .acf-label').each(function() {
                if ( jQuery(this).text().trim().length === 0 ) {
                    jQuery(this).remove();
                }
            });
            jQuery('#acf-group_654d33026beb4 .acf-field, #acf-group_65adb68866304 .acf-field').each(function() {
                jQuery(this).find('input').removeAttr('required');
                jQuery(this).removeAttr('data-required').removeClass('is-required');
            });
            jQuery('.acf-field-acfe-hidden').each(function() {
                jQuery(this).parent('td').parent('tr').hide();
            });
        </script>
    <?php
} );