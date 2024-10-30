<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/admin/partials
 */

?>

<div id="dark-mode">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( 'Settings', 'catch-dark-mode' ); ?></h2>
		</div> <!-- .Header -->
		<div class="content">
			<?php if ( isset( $_GET['settings-updated'] ) ) { ?>
				<div id="message" class="notice updated fade">
					<p><strong><?php esc_html_e( 'Plugin Options Saved.', 'catch-dark-mode' ); ?></strong></p>
				</div>
			<?php } ?>

			<?php
			// Use nonce for verification.
			wp_nonce_field( CATCH_DARK_MODE_BASENAME, 'catch_dark_mode_nounce' );
			?>

			<div id="dark-mode-main" class="dark-mode-main">
				<form method="post" action="options.php">
					<?php settings_fields( 'catch-dark-mode-group' ); ?>
					<?php
						$settings         = $this->main->get_options();
						$schemes          = $this->main->color_schemes();
						$switch_styles    = $this->main->switch_styles();
						$switch_positions = $this->main->switch_positions();

					?>
					<div class="option-container">
						<table class="form-table">
							<tbody>
								<?php
								$theme_support = get_theme_support( 'catch-dark-mode' );
								?>
									<tr>
										<th scope="row"><?php esc_html_e( 'Color Schemes', 'catch-dark-mode' ); ?></th>
										<td>
											<div class="icon-scheme">
										<?php
										foreach ( $schemes as $key => $scheme ) :
											$label  = $scheme['label'];
											$is_pro = false;
											if ( isset( $scheme['is_pro'] ) && true === $scheme['is_pro'] ) {
												$is_pro = true;
											}
											?>
												<label
												<?php
												echo ( $is_pro ) ? 'class="pro"' : '';
												?>
												>
												<?php
												if ( isset( $scheme['is_pro'] ) && $scheme['is_pro'] === true ) {
													echo '<span class="pro-tag">PRO</span>';
												}
												?>
												<input <?php echo ( $is_pro ) ? 'disabled="disabled"' : ''; ?> type="radio" class="scheme" name="catch_dark_mode_options[scheme]" value="<?php echo esc_attr( $key ); ?>" 
													<?php
													if ( $key === $settings['scheme'] ) {
														echo esc_attr( 'checked=checked' );
													}
													?>
													>
												<span class="image-holder">
													<img src="<?php echo esc_url( $scheme['icon'] ); ?>" alt="<?php echo esc_attr( $key ); ?>" />
													<span>
														<?php echo esc_html( $label ); ?>
													</span>
												</span>
												</label>
											<?php endforeach; ?>	
											</div>
										</td>
									</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Enable Dark mode by default', 'catch-dark-mode' ); ?></th>
									<td>
										<div class="module-header <?php echo esc_attr( $settings['enable_default'] ) ? 'active' : 'inactive'; ?>">
											<div class="switch">
												<input type="checkbox" name="catch_dark_mode_options[enable_default]" id="catch_dark_mode_options[enable_default]" class="ctp-switch" value="1" <?php checked( true, $settings['enable_default'] ); ?> >
												<label for="catch_dark_mode_options[enable_default]"></label>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Show floating switch', 'catch-dark-mode' ); ?></th>
									<td>
										<div class="module-header <?php echo esc_attr( $settings['floating_switch'] ) ? 'active' : 'inactive'; ?>">
											<div class="switch">
												<input type="checkbox" name="catch_dark_mode_options[floating_switch]" id="catch_dark_mode_options[floating_switch]" class="ctp-switch" value="1" <?php checked( true, $settings['floating_switch'] ); ?> >
												<label for="catch_dark_mode_options[floating_switch]"></label>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Enable OS aware darkmode', 'catch-dark-mode' ); ?></th>
									<td>
										<div class="module-header <?php echo esc_attr( $settings['os_aware'] ) ? 'active' : 'inactive'; ?>">
											<div class="switch">
												<input type="checkbox" name="catch_dark_mode_options[os_aware]" id="catch_dark_mode_options[os_aware]" class="ctp-switch" value="1" <?php checked( true, $settings['os_aware'] ); ?> >
												<label for="catch_dark_mode_options[os_aware]"></label>
											</div>
										</div>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Enabling this option will automatically set the theme mode for you. (i.e. if you have dark mode option enabled on your operating system, automatically dark mode will be enabled on your site as well)', 'catch-dark-mode-pro' ); ?>"></span>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Switch style', 'catch-dark-mode' ); ?></th>
									<td>
									<div class="switch-icon-holder">
										<?php
										foreach ( $switch_styles as $key => $style ) :
											$label  = $style['label'];
											$is_pro = false;
											if ( isset( $style['is_pro'] ) && true === $style['is_pro'] ) {
												$is_pro = true;
											}
											?>
											<label
											<?php
											echo ( $is_pro ) ? 'class="pro"' : '';
											?>
											>
											<?php
											echo ( $is_pro ) ? '<span class="pro-tag">Pro</span>' : '';
											?>
												<input <?php echo ( $is_pro ) ? 'disabled="disabled"' : ''; ?> type="radio" class="scheme" name="catch_dark_mode_options[switch_style]" value="<?php echo esc_attr( $key ); ?>" 
													<?php
													if ( $key === $settings['switch_style'] ) {
														echo esc_attr( 'checked=checked' );
													}
													?>
													>
												<span class="image-holder">
													<img src="<?php echo esc_url( $style['icon'] ); ?>" alt="<?php echo esc_attr( $key ); ?>" />
													<span>
														<?php echo esc_html( $label ); ?>
													</span>
												</span>
											</label>

										<?php endforeach; ?>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Switch position', 'catch-dark-mode' ); ?></th>
									<td>
										<?php
										foreach ( $switch_positions as $key => $position ) :
											?>
										<label><?php echo esc_html( $position ); ?></label>
										<input type="radio" name="catch_dark_mode_options[switch_position]" value="<?php echo esc_attr( $key ); ?>" 
											<?php
											if ( $key === $settings['switch_position'] ) {
												echo esc_attr( 'checked=checked' );
											}
											?>
										>
										<?php endforeach; ?>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Reset Options', 'catch-dark-mode' ); ?></th>
									<td>
										<input name="catch_dark_mode_options[reset]" id="catch_dark_mode_options[reset]" type="checkbox" value="1" class="catch_dark_mode_options[reset]" /><?php echo esc_html__( 'Check to reset', 'catch-dark-mode' ); ?>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'catch-dark-mode' ); ?>"></span>
									</td>
								</tr>

							</tbody>
						</table>

						<?php submit_button( esc_html__( 'Save Changes', 'catch-dark-mode' ) ); ?>
					</div><!-- .option-container -->
				</form>
			</div><!-- #dark_mode_main -->
		</div><!-- .content -->
	</div><!-- .content-wrapper -->
</div><!-- .content-wrapper -->
