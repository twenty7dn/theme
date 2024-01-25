<?php
add_filter( 'wp_die_handler', function() {
    if ( $_SERVER['REQUEST_URI'] == '/dashboard/login/' ) {
        header( 'Location: /dashboard/' );
    }
});

add_action( 'login_header', function() {
    $imgix = new Imgix(); ?>
	<style>
        :root {
            --accent: #F9D236;
            --border: #F9D236;
            --menuItemHover: #F2AF20;
            --menuItemHoverBorder: #F2AF20;
            --menuItemCurrent: #F2AF20;
            --menuItemCurrentBorder: #F2AF20;
            --text: #0D0A0A;
        }
	</style>
	<style>
        .language-switcher {
            display: none !important;
        }
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #171717 !important;
            /* background-size: 512px !important;
            background-repeat: repeat !important;
            background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/images/pattern.svg?v=1'; ?>) !important; */
        }
        .background-image {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.25;
            -webkit-filter: blur(64px);
            filter: blur(64px);
            z-index: -1;
        }
        #inner {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            width: 856px;
            height: auto;
            min-height: 464px;
            background-color: #fff;
            border-radius: 1px;
            -webkit-box-shadow: 0 3px 18px 0 rgba(0, 0, 0, 0.25);
            box-shadow: 0 3px 18px 0 rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }
        #user_pass {
            margin-right: 0 !important;
        }
        #inner > .cover {
            position: relative;
        }
        #inner > .cover .cover-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #inner > .cover > .content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 40px 48px;
            color: #fff;
            background-color: rgba(23, 23, 23, 0.5);
            box-sizing: border-box;
        }
        #inner > .cover > .content > h2 {
            font-size: 2.125rem;
            /* font-size: 1.4rem; */
            text-transform: uppercase;
            text-align: left;
            line-height: 2.5rem;
            margin-bottom: 0.5em;
        }
        #inner > .cover > .content > h2 > a {
            position: relative;
            color: #fff;
            font-size: inherit;
            text-decoration: none;
        }
        #inner > .cover > .content > h2 > a svg {
            position: absolute;
            width: 2em;
            height: 2em;
            left: 100%;
            top: calc(50% - 0.125em);
            transform: translate(-0.5em, -50%);
        }
        #inner > .cover > .content > p {
            font-size: 1.05rem;
            font-weight: 200;
            line-height: 1.5rem;
        }
        #inner > .cover > .content > p + p {
            margin-top: 0.5em;
        }
        #inner > .cover > .image-credit {
            position: absolute;
            left: 48px;
            bottom: 40px;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 200;
            z-index: 1;
        }
        #inner > .cover > .image-credit a {
            color: inherit;
            font-weight: 500;
            text-decoration: none;
        }
        #inner > .form-wrapper {
            position: relative;
            padding: 40px 48px;
        }
        #inner > .form-wrapper > a {
            display: inline-block !important;
            color: #5d5d6d !important;
            text-decoration: none !important;
        }
        #inner > .form-wrapper > a svg {
            width: 1em;
            height: 1em;
            margin: 3px 1px 3px 0;
            float: left;
        }
        #inner > .form-wrapper > h1 {
            color: #111;
            font-size: 1.75rem;
            font-weight: bold;
            text-align: left;
            line-height: 1em;
            margin-bottom: 0.5em;
        }
        #inner > .form-wrapper > .close {
            position: absolute;
            inset: 1.5em 1.5em auto auto;
        }
        #inner > .form-wrapper > .close svg {
            display: block;
            width: 2em;
            height: 2em;
        }
        #inner > .form-wrapper > #login {
            width: 100%;
            max-width: 100%;
            padding: 0;
            margin: 0;
        }
        #inner > .form-wrapper > #login > h1 {
            display: none;
        }
        #inner > .form-wrapper > #guidelines {
            color: #9b9da6 !important;
            font-size: 0.75rem !important;
        }
        #inner > .form-wrapper > #guidelines a {
            color: #5d5d6d !important;
        }
        #inner > .form-wrapper > #guidelines hr {
            border: none !important;
            height: 2px !important;
            background-color: #E5E5E5 !important;
            margin: 0.5em 0 !important;
            opacity: 0.5 !important;
        }
        #loginform,
        #lostpasswordform {
            padding: 0;
            border: none;
            margin: 20px 0 24px;
            margin: 2px 0 0 !important;
            box-shadow: none !important;
        }
        .login label {
            color: #5d5d6d !important;
            font-size: 0.75rem !important;
            font-weight: 500 !important;
        }
        .login input[type="text"],
        .login input[type="password"],
        .login input[type="tel"] {
            font-size: 0.9rem !important;
            line-height: 1em !important;
            min-height: 38.2px !important;
            padding: 8px 12px !important;
            background-color: #f8f8f8 !important;
            border: 1px solid #d7d7da !important;
            border-radius: 2px !important;
            box-shadow: none !important;
        }
        .login input[type="text"]:hover,
        .login input[type="password"]:hover,
        .login input[type="tel"]:hover {
            border-color: #b1b1b9 !important;
        }
        .login input[type="text"]:focus,
        .login input[type="password"]:focus,
        .login input[type="tel"]:focus {
            border-color: var(--accent) !important;
        }
        .login input[type="password"] {
            padding-right: 2.5rem !important;
        }
        #rememberme {
            margin: 0 5px 0 0 !important;
            border: 2px solid var(--accent) !important;
            border-radius: 1px !important;
            background-color: #fff !important;
            box-shadow: none !important;
        }
        #rememberme:checked {
            background-color: var(--accent) !important;
        }
        #rememberme:checked::before {
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='<?php echo str_replace( '#', '%23', '#0D0A0A' ); ?>' d='M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z' /%3E%3C/svg%3E") !important;
            transform: scale(0.65) translate(-1px, -3px) !important;
        }
        .backup-methods-wrap {
            padding: 0 !important;
            margin-top: -48px !important;
            margin-bottom: 24px !important;
        }
        .forgetmenot {
            display: inline-flex !important;
            min-height: 32px !important;
            align-items: center;
        }
        .forgetmenot > label {
            font-weight: 300 !important;
            margin: 0 !important;
        }
        .login .button.wp-hide-pw {
            position: absolute;
            top: -2px !important;
            color: var(--accent) !important;
            border: none !important;
            box-shadow: none !important;
        }
        .wp-core-ui .button-primary,
        .wp-core-ui .itsec-pwls-login__link,
        .wp-core-ui .itsec-pwls-login__submit {
            border: none !important;
            border-radius: 1px !important;
            color: var(--text) !important;
            background-color: var(--accent) !important;
            box-shadow: none !important;
        }
        .wp-core-ui .button-primary:hover,
        .wp-core-ui .itsec-pwls-login__link:hover,
        .wp-core-ui .itsec-pwls-login__submit:hover {
            background-color: var(--menuItemCurrent) !important;
        }
        .wp-core-ui .button-secondary:not(.wp-hide-pw) {
            padding: 0 !important;
            border: none !important;
            border-radius: 1px !important;
            background-color: #fff !important;
            box-shadow: none !important;
            color: #5d5d6d !important;
            text-decoration: underline !important;
        }
        .wp-core-ui .button-secondary:not(.wp-hide-pw):hover {
            color: #5d5d6d !important;
        }
        #nav, #backtoblog {
            display: none !important;
        }
        #login form {
            padding: 0;
        }
        #login form p {
            color: #9b9da6 !important;
            font-size: 0.75rem !important;
        }
        #login form .forgetmenot {
            margin: 0;
        }
        .login #login_error,
        .login #login-message,
        .login .message,
        .notice.notice-error {
            text-align: left !important;
            padding: 0.5em 0.75em !important;
            margin: 2em 1px 0 !important;
            box-shadow: 0 0 0 1px #d7d7da !important;
            border-radius: 1px !important;
            border-width: 0 0 0 4px !important;
        }
        .itsec-pwls-login .notice p {
            margin: 0 !important;
        }
        .itsec-passwordless-login, form[method="post"] {
            border: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }
        .itsec-pwls-login-fallback {
            margin-bottom: 1em !important;
        }
        .login #login_error a,
        .login #login-message a,
        .login .message a {
            color: #5d5d6d !important
        }
        #webauthn-retry {
            text-align: right !important;
        }
		<?php if ( isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] == 'iframe' ) { ?>
        body {
            background: #fff !important;
            height: max-content !important;
        }
        #inner {
            display: block !important;
            width: 100% !important;
            height: 100% !important;
        }
        #inner > .form-wrapper > .close {
            display: none !important;
        }
		<?php } ?>
        @media screen and (max-width: 1000px) and (orientation: portrait) {
            html, body {
                height: auto;
            }
            #inner {
                position: relative;
                display: block;
                width: 100%;
                height: auto;
                z-index: 1;
            }
            #inner > .cover > .content {
                position: relative;
            }
            #inner > .cover > .content > p {
                margin-bottom: 3em;
            }
        }
        @media screen and (max-width: 1000px) and (orientation: landscape) {
            html, body {
                height: auto;
            }
            #inner {
                position: relative;
                width: 100%;
                height: auto;
                z-index: 1;
            }
            #inner > .cover > .content {
                position: relative;
            }
            #inner > .cover > .content > p {
                margin-bottom: 3em;
            }
            #inner > .cover > .image-credit {
                max-width: calc(100% - 96px);
            }
        }
        .submit + script {
            display: none !important;
        }
        #simba_two_factor_auth, label[for="simba_two_factor_auth"] {
            width: 100% !important;
        }
		<?php if ( $_SERVER['HTTP_USER_AGENT'] == 'WolfheadTVAdminApp' ) { ?>
        html, body {
            overflow: hidden !important;
        }
        #inner,
        #inner > .form-wrapper {
            display: block !important;
            height: 100vh !important;
        }
        #inner > .cover,
        #inner > .form-wrapper > a,
        #inner > .form-wrapper > br {
            display: none !important;
        }
		<?php } ?>
        .itsec-pwls-login__fields__sub {
            display: grid !important;
            grid-template-columns: repeat(2, auto) !important;
            gap: 3px !important;
        }
        .itsec-pwls-login-fallback {
            grid-column: 1 / -1 !important;
        }
        .itsec-recaptcha-opt-in {
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            margin-bottom: 1em !important;
        }
        #login form p.submit #wp-submit {
            display: block !important;
            width: 100% !important;
            float: none !important;
        }
        .itsec-pwls-login--hide .itsec-pwls-login-fallback {
            position: relative !important;
            padding: 0 !important;
            margin: 2.5em 0 3em 0 !important;
        }
        .itsec-pwls-login__title, .itsec-pwls-login__description {
            display: none !important;
        }
        #loginform {
            padding-top: 0 !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        label[for="user_login"] {
            margin-top: 1em;
        }
        .forgetmenot {
            display: none !important;
        }
        #webauthn-retry[hidden="hidden"] {
            display: block !important;
        }
        #webauthn-retry[hidden="hidden"] button {
            visibility: hidden !important;
            pointer-events: none !important;
        }
        .wp-webauthn-notice,
        .user-pass-wrap,
        [for="user_login"],
        #user_login,
        .itsec-pwls-login__title,
        .itsec-pwls-login__description,
        .itsec-pwls-login__link-wrap.itsec-pwls-login__link-wrap--magic,
        .itsec-pwls-login-fallback {
            display: none !important;
        }
        .itsec-pwls-login__fields {
            margin: 0 0 1em !important;
        }
        #login form p.submit {
            width: 100% !important;
        }
        #wp-webauthn-check {
            display: block !important;
            width: 100% !important;
            line-height: 2.5rem !important;
        }
        #login form .itsec-recaptcha-opt-in p {
            color: #787a84 !important;
        }
        .itsec-recaptcha-opt-in a {
            color: #5d5d6d !important;
        }
        #login-message + .wwa-webauthn-only {
            margin-top: 1em !important;
        }
	</style>
	<?php echo $imgix->get_image( get_field( 'background', 'options' ), array('(orientation: landscape)' => array('w' => 1920, 'h' => 1080), '(orientation: portrait)' => array('w' => 1080, 'h' => 1920) ), array( 'background-image' ) ); ?>
	<main id="inner">
		<?php if ( isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe' ) { ?>
			<div class="cover">
				<?php echo $imgix->get_image( get_field( 'background', 'options' ), array('' => array('w' => 512, 'h' => 512) ), array( 'cover-image' ) ); ?>
				<div class="content">
                    <a href="<?php echo HEADLESS_FRONTEND_URL; ?>">
                        <?php echo $imgix->get_image( get_field( 'icon', 'options' ), array('' => array('w' => 96, 'h' => 96) ) ); ?>
                    </a>
					<h2><?php echo get_field( 'login_headline', 'options' ); ?></h2>
					<?php echo get_field( 'login_description', 'options' ); ?>
				</div>
				<?php if ( ! empty( get_field( 'image_credit', get_field( 'background', 'options' ) ) ) ) { ?>
					<div class="image-credit">
						<?php echo preg_replace('/class=".*?"/', '', links_add_target( strip_tags( get_field( 'image_credit', get_field( 'background', 'options' ) ), '<a>' ) ) ); ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="form-wrapper">
			<a href="<?php echo HEADLESS_FRONTEND_URL; ?>">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" /></svg>
				Home
			</a><br>
			<h1>Sign In</h1>
			<!-- <a class="close" href="#" onclick="history.back();"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" /></svg></a> -->
			<?php }, 10 );

			add_action( 'login_footer', function() { ?>
			<div id="guidelines">
				<p>
					If you are an approved guest writer, please send your post and any related images to <a href="mailto:mail@davidmc.io">mail@davidmc.io</a> and I will decide whether or not to publish it.
				</p>
				<hr/>
				<p>
					Please understand that not all submissions
					will fit the general theme of the blog.
				</p>
			</div>
		</div>
	</main>
	<script>
        // document.querySelector('p.backup-methods > a').innerHTML = 'Use backup code';
        // document.querySelector('p.backup-methods > a').addEventListener('click', function() {
        //     document.querySelector('p.backup-methods').style.display = 'none';
        // });
        jQuery('p').each(function() {
            if (jQuery(this).text() == "") { // you can change this to whatever #ex: char length
                jQuery(this).parent(".notice").remove();
            }
        });
        // jQuery('.forgetmenot, .itsec-pwls-login-fallback').wrapAll('<div class="itsec-pwls-login__fields__sub"></div>');
	</script>
    <script>
        setTimeout(() => {
            document.querySelector('#wp-webauthn-check').click();
            // document.querySelector('#wp-webauthn-check').removeAttribute('hidden');
            document.querySelector('#user_login').parentNode.style.display = 'none';
        }, 250);
    </script>
<?php }, 10 );

function my_theme_scripts() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'login_enqueue_scripts', 'my_theme_scripts' );

add_filter( 'login_message', 'so_13641385_custom_logout_message' );
// Detect logout or login, and display correspondent message
function so_13641385_custom_logout_message()
{
	//check to see if it's the logout screen
	if ( isset($_GET['loggedout']) && TRUE == $_GET['loggedout'] ) {
		$message = "<p id='login-message' class='success'>You've successfully signed out.</p>";
	}

	//they are logged in
	if ( is_user_logged_in() ) {
		$message = "<p id='login-message' class='success'>You are currently signed in.</p>";
	}

	if ( $_GET['action'] == 'loggedoutsession' ) {
		$message = "<div id='login_error'>Your session has either ended, or you've signed into another client.</div>";
	}

	return $message;
}

/**
 * Change text strings
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'The one-time password (TFA code) you entered was incorrect.' :
			$translated_text = __( 'Incorrect one-time password.', 'valkyrie' );
			break;
		case '(check your OTP app to get this password)' :
			$translated_text = __( '', 'valkyrie' );
			break;
		case 'One Time Password (i.e. 2FA)' :
			$translated_text = __( 'One-time password', 'valkyrie' );
			break;
		case 'Remember Me' :
			$translated_text = __( 'Keep me signed in', 'valkyrie' );
			break;
		case 'Username or Email Address' :
			$translated_text = __( 'Username', 'valkyrie' );
			break;
		case 'Authentication Code:' :
			$translated_text = __( 'One-time password', 'valkyrie' );
			break;
		case 'Log In' :
			$translated_text = __( 'Sign In', 'valkyrie' );
			break;
		case 'Please enter the two-factor authentication (2FA) verification code below to login. Depending on your 2FA setup, you can get the code from the 2FA app or it was sent to you by email. Note: if you are supposed to receive an email but did not receive any, please click the Resend Code button to request another code.' :
			$translated_text = __( 'Please enter the two-factor authentication (2FA) verification code below to sign in.', 'valkyrie' );
			break;
		case 'You are now logged out.' :
			$translated_text = __( '', 'valkyrie' );
			break;
		case 'Please log in again.' :
			$translated_text = __( '', 'valkyrie' );
			break;
        case 'Auth' :
            $translated_text = __( 'Authenticate', 'valkyrie' );
            break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );