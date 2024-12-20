<?php
/**
 * Electronic Gadget Store Theme Page
 *
 * @package Electronic Gadget Store
 */

function electronic_gadget_store_admin_scripts() {
	wp_dequeue_script('electronic-gadget-store-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'electronic_gadget_store_admin_scripts' );

if ( ! defined( 'ELECTRONIC_GADGET_STORE_FREE_THEME_URL' ) ) {
	define( 'ELECTRONIC_GADGET_STORE_FREE_THEME_URL', 'https://www.themespride.com/products/free-gadget-store-wordpress-theme' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_PRO_THEME_URL' ) ) {
	define( 'ELECTRONIC_GADGET_STORE_PRO_THEME_URL', 'https://www.themespride.com/products/electronic-store-wordpress-theme' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_DEMO_THEME_URL' ) ) {
	define( 'ELECTRONIC_GADGET_STORE_DEMO_THEME_URL', 'https://page.themespride.com/electronic-gadget-store/' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_DOCS_THEME_URL' ) ) {
    define( 'ELECTRONIC_GADGET_STORE_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/electronic-gadget-store/' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_RATE_THEME_URL' ) ) {
    define( 'ELECTRONIC_GADGET_STORE_RATE_THEME_URL', 'https://wordpress.org/support/theme/electronic-gadget-store/reviews/#new-post' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_CHANGELOG_THEME_URL' ) ) {
    define( 'ELECTRONIC_GADGET_STORE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_SUPPORT_THEME_URL' ) ) {
    define( 'ELECTRONIC_GADGET_STORE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/electronic-gadget-store/' );
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_THEME_BUNDLE' ) ) {
    define( 'ELECTRONIC_GADGET_STORE_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}
/**
 * Add theme page
 */
function electronic_gadget_store_menu() {
	add_theme_page( esc_html__( 'About Theme', 'electronic-gadget-store' ), esc_html__( 'Begin Installation - Import Demo', 'electronic-gadget-store' ), 'edit_theme_options', 'electronic-gadget-store-about', 'electronic_gadget_store_about_display' );
}
add_action( 'admin_menu', 'electronic_gadget_store_menu' );


/**
 * Display About page
 */
function electronic_gadget_store_about_display() {
	$electronic_gadget_store_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $electronic_gadget_store_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$electronic_gadget_store_description = explode( '. ', $electronic_gadget_store_theme->get( 'Description' ) );

					array_pop( $electronic_gadget_store_description );

					$electronic_gadget_store_description = implode( '. ', $electronic_gadget_store_description );

					echo esc_html( $electronic_gadget_store_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'electronic-gadget-store' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'electronic-gadget-store' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'electronic-gadget-store' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'electronic-gadget-store' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'electronic-gadget-store' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $electronic_gadget_store_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'electronic-gadget-store' ); ?>">

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-gadget-store-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'electronic-gadget-store-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'One Click Demo Import', 'electronic-gadget-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-gadget-store-about', 'tab' => 'about_theme' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'about_theme' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'electronic-gadget-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-gadget-store-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'electronic-gadget-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-gadget-store-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'electronic-gadget-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-gadget-store-about', 'tab' => 'get_bundle' ), 'themes.php' ) ) ); ?>" class="blink wp-bundle nav-tab<?php echo ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Get WordPress Theme Bundle', 'electronic-gadget-store' ); ?></a>

		</nav>

		<?php
			electronic_gadget_store_demo_import();

			electronic_gadget_store_main_screen();

			electronic_gadget_store_changelog_screen();

			electronic_gadget_store_free_vs_pro();

			electronic_gadget_store_get_bundle();

		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'electronic-gadget-store' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'electronic-gadget-store' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'electronic-gadget-store' ) : esc_html_e( 'Go to Dashboard', 'electronic-gadget-store' ); ?></a>
		</div>
	</div>
	<?php
}


/**
 * Output the Demo Import screen.
 */

function electronic_gadget_store_demo_import() {
    if ( isset( $_GET['page'] ) && 'electronic-gadget-store-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {

         // Path to whizzie.php in child theme
	    $child_whizzie_path = get_stylesheet_directory() . '/inc/whizzie.php';
	    
	    // Path to whizzie.php in parent theme
	    $parent_whizzie_path = get_template_directory() . '/inc/whizzie.php';

	    // Check if the child theme is active and if whizzie.php exists in the child theme
	    if ( file_exists( $child_whizzie_path ) ) {
	        require_once $child_whizzie_path;
	    } else {
	        // Fallback to parent theme if child theme does not have whizzie.php
	        require_once $parent_whizzie_path;
	    }

        if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) { ?>
            <div class="col card success-demo">
                <p class="imp-success"><?php echo esc_html__('Imported Successfully', 'electronic-gadget-store'); ?></p><br>
                <a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>" target="_blank">
                    <?php echo esc_html__('Go to Customizer', 'electronic-gadget-store'); ?>
                </a>
            </div>
            <script type="text/javascript">
                // Immediately redirect to Customizer
                window.location.href = "<?php echo esc_url(admin_url('customize.php')); ?>";
            </script>
        <?php } else { ?>
            <div class="col card demo-btn text-center">
                <form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php" method="POST">
                    <p class="demo-title"><?php echo esc_html__('Demo Importer', 'electronic-gadget-store'); ?></p>
                    <p class="demo-des"><?php echo esc_html__('This theme supports importing demo content with a single click. Use the button below to quickly set up your site. You can easily customize or deactivate the imported content later through the Customizer.', 'electronic-gadget-store'); ?></p>
                    <i class="fas fa-long-arrow-alt-down"></i>
                    <input type="submit" name="submit" class="button button-primary with-icon" value="<?php echo esc_attr__('Begin Installation - Import Demo', 'electronic-gadget-store'); ?>">
                </form>
            </div>
            <script type="text/javascript">
                jQuery('#demo-importer-form').on('submit', function (e) {
                    e.preventDefault();
                    if(confirm("Are you sure you want to proceed with the demo import?")){
                        var url = new URL(location.href);
                        url.searchParams.append('import-demo', true);
                        location.href = url;
                    } else {
                        return false;
                    }
                });
            </script>
        <?php }
    }
}

/**
 * Output the main about screen.
 */
function electronic_gadget_store_main_screen() {
	if ( isset( $_GET['tab'] ) && 'about_theme' === $_GET['tab'] ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'electronic-gadget-store' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'electronic-gadget-store' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'electronic-gadget-store' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'electronic-gadget-store' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'electronic-gadget-store' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'electronic-gadget-store' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'electronic-gadget-store' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'electronic-gadget-store' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'electronic-gadget-store' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function electronic_gadget_store_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'electronic-gadget-store' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'electronic_gadget_store_changelog_file', ELECTRONIC_GADGET_STORE_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = electronic_gadget_store_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function electronic_gadget_store_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function electronic_gadget_store_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'electronic-gadget-store' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'electronic-gadget-store' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'electronic-gadget-store' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'electronic-gadget-store' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'electronic-gadget-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(ELECTRONIC_GADGET_STORE_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'electronic-gadget-store' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}

function electronic_gadget_store_get_bundle() {
	if ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'Get WordPress Theme Bundle', 'electronic-gadget-store' ); ?></p>
			<div class="col card">
				<h2 class="title"><?php esc_html_e( ' WordPress Theme Bundle of 90+ Themes At 15% Discount. ', 'electronic-gadget-store' ); ?></h2>
				<p><?php esc_html_e( 'Spring Offer Is To Get WP Bundle of 90+ Themes At 15% Discount use the coupon', 'electronic-gadget-store' ) ?>"<input type="text" value=" TPRIDE15 "  id="myInput">".</p>
				<p><a target="_blank" href="<?php echo esc_url( ELECTRONIC_GADGET_STORE_THEME_BUNDLE ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Bundle', 'electronic-gadget-store' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}