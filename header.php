<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Twenty7_Degrees_North
 */
if ( ( !is_user_logged_in() || $_GET['adminbar'] !== 'show' ) && $_GET['getHead'] !== 'true' ) {
	wp_redirect( admin_url( '/' ) );
	exit;
}
$cssUrl = admin_url( '/css/colors/modern/colors.css' ); // Replace with the actual URL or path
$prefix = '.wp-admin-bar-container '; // The prefix you want to add

// Fetch the CSS content
$cssContent = file_get_contents($cssUrl);
if ($cssContent === false) {
    die("Failed to fetch CSS content.");
}

// Remove CSS comments
$cssContent = preg_replace('!/\*.*?\*/!s', '', $cssContent);

// A more sophisticated regex to handle multiple selectors
$regex = '/(?<!\w)([^\{\}]*?)(\{)/';

$prefixedCssContent = preg_replace_callback($regex, function($matches) use ($prefix) {
    // Split multiple selectors
    $selectors = explode(',', $matches[1]);
    $prefixedSelectors = array_map(function($selector) use ($prefix) {
        // Add the prefix to each selector
        return trim($prefix . ' ' . trim($selector));
    }, $selectors);

    // Reassemble the prefixed selectors and return the modified line
    return implode(', ', $prefixedSelectors) . $matches[2];
}, $cssContent);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<base target="_top"/>

	<?php wp_head(); ?>
</head>

<body>
<style><?php echo $prefixedCssContent ?></style>
<style>#wp-admin-bar-tm-suspend,#wp-admin-bar-vercel-deploy-button,#wp-admin-bar-rank-math,#wp-admin-bar-wp-rest-cache-clear,#wp-admin-bar-delete-cache{display:none!important;}</style>