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

<div class="wrap">
	<h1 class="wp-heading-inline"><?php esc_html_e( 'Catch Dark Mode', 'catch-dark-mode' ); ?></h1>
	<div id="plugin-description">
		<p><?php esc_html_e( 'Catch Dark Mode is a Free Dark Mode WordPress plugin with fully customizable features and visually pleasing schemes that allows you to enable the aesthetic dark mode option on your WordPress site for your visitors.', 'catch-dark-mode' ); ?></p>
	</div>
	<div class="catchp-content-wrapper">
		<div class="catchp_widget_settings">

			<h2 class="nav-tab-wrapper">
				<a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( 'Dashboard', 'catch-dark-mode' ); ?></a>
				<a class="nav-tab" id="features-tab" href="#features"><?php esc_html_e( 'Features', 'catch-dark-mode' ); ?></a>
				<a class="nav-tab" id="premium-extensions-tab" href="#premium-extensions"><?php esc_html_e( 'Compare Table', 'catch-dark-mode' ); ?></a>
			</h2>

			<div id="dashboard" class="wpcatchtab  nosave active">

				<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/dashboard.php'; ?>

			</div><!-- .dashboard -->

			<div id="features" class="wpcatchtab save">
				<div class="content-wrapper col-3">
					<div class="header">
						<h3><?php esc_html_e( 'Features', 'catch-dark-mode' ); ?></h3>

					</div><!-- .header -->
					<div class="content">
						<ul class="catchp-lists">
							<li>
								<strong><?php esc_html_e( 'Easy to Set Up', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'The plugin for infinite scrolling is extremely easy to set up on any website. Anyone (even the beginners) can easily set it up. With zero coding knowledge, you can easily customize Dark Mode plugin your way and enjoy the infinite scrolling on your website.', 'catch-dark-mode' ); ?></p>
							</li>
							<li>
								<strong><?php esc_html_e( 'Incredible Support', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'We have a great line of support team and support documentation. You do not need to worry about how to use the plugins we provide, just refer to our Tech Support Forum. Further, if you need to do advanced customization to your website, you can always hire our theme customizer!', 'catch-dark-mode' ); ?></p>
							</li>
							<li>
								<strong><?php esc_html_e( 'Different Prebuilt Color Schemes', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'In case your theme does not support color schemes, you still get 3 different inbuilt color schemes with the Catch Dark Mode Pro plugin. This feature is for those who are using themes without any color scheme support. Pick your favorite color scheme that matches with your site theme. ', 'catch-dark-mode' ); ?></p>
							</li>	
							<li>
								<strong><?php esc_html_e( 'Switch Style', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'You can customize how your dark mode switch looks. There are 3 different styles available for your switch. Whatever suits your site the best!', 'catch-dark-mode' ); ?></p>
							</li>

							<li>
								<strong><?php esc_html_e( 'Switch Position', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'There are 2 switch positions available with Catch Dark Mode Pro – Bottom Left, Bottom Right, Top Left, and Top Right. Place the switch wherever you feel comfortable!', 'catch-dark-mode' ); ?></p>
							</li>
							<li>
								<strong><?php esc_html_e( 'OS Awareness ', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'You have the option to automatically enable the dark mode if your OS supports dark mode. After enabling the OS Awareness, if your users are using dark mode on their OS, your site will automatically change to dark mode. ', 'catch-dark-mode' ); ?></p>
							</li>

							<li>
								<strong><?php esc_html_e( 'Floating Switch', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'A floating switch is available that allows your users to click and activate the dark mode in just a single click whenever they wish. With this switch, you provide your users an option to switch to dark mode according to their preference. ', 'catch-dark-mode' ); ?></p>
							</li>	
							<li>
								<strong><?php esc_html_e( 'Supports all themes on WordPress', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'You don’t have to worry if you have a slightly different or complicated theme installed on your website. It supports all the themes on WordPress and makes your website more striking and playful.', 'catch-dark-mode' ); ?></p>
							</li>

							<li>
								<strong><?php esc_html_e( 'Lightweight', 'catch-dark-mode' ); ?></strong>
								<p><?php esc_html_e( 'It is extremely lightweight. You do not need to worry about it affecting the space and speed of your website.', 'catch-dark-mode' ); ?></p>
							</li>	
						</ul>
						<a href="https://catchplugins.com/plugins/dark-mode-pro/" target="_blank"><?php esc_html_e( 'Upgrade to Catch Dark Mode Premium »', 'catch-dark-mode' ); ?></a>
					</div><!-- .content -->
				</div><!-- content-wrapper -->
			</div> <!-- Featured -->

			<div id="premium-extensions" class="wpcatchtab  save">

				<div class="about-text">
					<h2><?php esc_html_e( 'Get Catch Dark Mode Pro -', 'catch-dark-mode' ); ?> <a href="https://catchplugins.com/plugins/dark-mode-pro/" target="_blank"><?php esc_html_e( 'Get It Here!', 'catch-dark-mode' ); ?></a></h2>
					<p><?php esc_html_e( 'You are currently using the free version of Dark Mode.', 'catch-dark-mode' ); ?><br />
					<a href="https://catchplugins.com/plugins/" target="_blank"><?php esc_html_e( 'If you have purchased from catchplugins.com, then follow this link to the installation instructions (particularly step 1).', 'catch-dark-mode' ); ?></a></p>
				</div>

				<div class="content-wrapper">
					<div class="header">
						<h3><?php esc_html_e( 'Compare Table', 'catch-dark-mode' ); ?></h3>

					</div><!-- .header -->
					<div class="content">

						<table class="widefat fixed striped posts">
							<thead>
								<tr>
									<th id="title" class="manage-column column-title column-primary"><?php esc_html_e( 'Features', 'catch-dark-mode' ); ?></th>
									<th id="free" class="manage-column column-free"><?php esc_html_e( 'Free', 'catch-dark-mode' ); ?></th>
									<th id="pro" class="manage-column column-pro"><?php esc_html_e( 'Pro', 'catch-dark-mode' ); ?></th>
								</tr>
							</thead>

							<tbody id="the-list" class="ui-sortable">
								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'Super Easy Setup', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'Lightweight', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'Supports All Themes', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>
								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( '3 Different Prebuilt Color Schemes', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>
								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( '3 Switch Styles', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>
								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( '2 Switch Positions', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>
								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'OS Aware Scheme', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( '10 Different Prebuilt Color Schemes', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>


								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( '8 Switch Styles', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'Auto Schedule', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'Supports Color Schemes for Themes with Color Schemes Support', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( '4 Switch Positions', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

								<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
									<td>
										<strong><?php esc_html_e( 'Ads-free Dashboard', 'catch-dark-mode-pro' ); ?></strong>
									</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
									<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
								</tr>

							</tbody>

						</table>

					</div><!-- .content -->
				</div><!-- content-wrapper -->
			</div>

		</div><!-- .catchp_widget_settings -->


		<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/sidebar.php'; ?>
	</div> <!-- .catchp-content-wrapper -->

	<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/footer.php'; ?>
</div><!-- .wrap -->
