<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php wc_print_notices(); ?>

<div class="row">
	<div class="medium-10 medium-centered large-6 large-centered columns">

		<ul class="account-tab-list">

			<li class="account-tab-item">
				<a class="account-tab-link <?php echo ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' )  ? 'current':'registration_disabled' ?>" href="#login"><h1><?php _e( 'Login', 'woocommerce' ); ?></h1></a>
			</li>

			<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
				<li class="sep"><h1>/</h1></li>
				<li class="account-tab-item last">
					<a class="account-tab-link" href="#register"><h1><?php _e( 'Register', 'woocommerce' ); ?></h1></a>
				</li>
			<?php endif; ?>

		</ul>

		<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

		<div class="login-register-container">

					<div class="account-forms-container">


						<div class="account-forms">
							<form id="login" method="post" class="login-form">

								<?php do_action( 'woocommerce_login_form_start' ); ?>

								<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
								</p>
								<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
								</p>

								<?php do_action( 'woocommerce_login_form' ); ?>

								<p class="form-row form-footer">
									<?php wp_nonce_field( 'woocommerce-login' ); ?>
									<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
									<br/><br/>
									<label for="rememberme" class="inline">
										<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
									</label>
									<a class="lost-pass-link" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
								</p>

								<?php do_action( 'woocommerce_login_form_end' ); ?>

							</form>


						<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

							<form id="register" method="post" class="register register-form">

								<?php do_action( 'woocommerce_register_form_start' ); ?>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

									<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
										<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
									</p>

								<?php endif; ?>

								<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
								</p>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

									<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
										<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
										<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
									</p>

								<?php endif; ?>

								<!-- Spam Trap -->
								<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

								<?php do_action( 'woocommerce_register_form' ); ?>
								<?php do_action( 'register_form' ); ?>

								<p class="woocomerce-FormRow form-row">
									<?php wp_nonce_field( 'woocommerce-register' ); ?>
									<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
								</p>

								<?php do_action( 'woocommerce_register_form_end' ); ?>

							</form><!-- .register-->


						<?php endif; ?>
						</div><!-- .account-forms-->

					</div><!-- .account-forms-container-->
		</div><!-- .login-register-container-->

		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

	</div><!-- .large-6-->
</div><!-- .rows-->
