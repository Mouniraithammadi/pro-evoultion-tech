<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {

    // Function to install and activate plugins
    function electronic_gadget_store_import_demo_content() {
        // Define the plugins you want to install and activate
        $plugins = array(
            array(
                'slug' => 'woocommerce',
                'file' => 'woocommerce/woocommerce.php',
                'url'  => 'https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip'
            ),
            array(
                'slug' => 'currency-switcher-woocommerce',
                'file' => 'currency-switcher-woocommerce/currency-switcher-woocommerce.php',
                'url'  => 'https://downloads.wordpress.org/plugin/currency-switcher-woocommerce.latest-stable.zip'
            ),
            array(
                'slug' => 'gtranslate',
                'file' => 'gtranslate/gtranslate.php',
                'url'  => 'https://downloads.wordpress.org/plugin/gtranslate.latest-stable.zip' // Correct GTranslate URL
            ),
             array(
                'slug' => 'yith-woocommerce-wishlist',
                'file' => 'yith-woocommerce-wishlist/yith-woocommerce-wishlist.php',
                'url'  => 'https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.latest-stable.zip'
            ),
        );

        // Include required files for plugin installation
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

        // Loop through each plugin
        foreach ($plugins as $plugin) {
            $plugin_file = WP_PLUGIN_DIR . '/' . $plugin['file'];

            // Check if the plugin is installed
            if (!file_exists($plugin_file)) {
                // If the plugin is not installed, download and install it
                $upgrader = new Plugin_Upgrader();
                $result = $upgrader->install($plugin['url']);

                // Check for installation errors
                if (is_wp_error($result)) {
                    error_log('Plugin installation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error installing plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                    continue;
                }
            }

            // If the plugin exists but is not active, activate it
            if (file_exists($plugin_file) && !is_plugin_active($plugin['file'])) {
                $result = activate_plugin($plugin['file']);

                // Check for activation errors
                if (is_wp_error($result)) {
                    error_log('Plugin activation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error activating plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                }
            }
        }
    }

    // Call the import function
    electronic_gadget_store_import_demo_content();

    // ------- Create Nav Menu --------
$electronic_gadget_store_menuname = 'Main Menus';
$electronic_gadget_store_bpmenulocation = 'primary-menu';
$electronic_gadget_store_menu_exists = wp_get_nav_menu_object($electronic_gadget_store_menuname);

if (!$electronic_gadget_store_menu_exists) {
    $electronic_gadget_store_menu_id = wp_create_nav_menu($electronic_gadget_store_menuname);

    // Create Home Page
    $electronic_gadget_store_home_title = 'Home';
    $electronic_gadget_store_home = array(
        'post_type' => 'page',
        'post_title' => $electronic_gadget_store_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $electronic_gadget_store_home_id = wp_insert_post($electronic_gadget_store_home);

    // Assign Home Page Template
    add_post_meta($electronic_gadget_store_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $electronic_gadget_store_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($electronic_gadget_store_menu_id, 0, array(
        'menu-item-title' => __('Home', 'electronic-gadget-store'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $electronic_gadget_store_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $electronic_gadget_store_about_title = 'About Us';
    $electronic_gadget_store_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $electronic_gadget_store_about = array(
        'post_type' => 'page',
        'post_title' => $electronic_gadget_store_about_title,
        'post_content' => $electronic_gadget_store_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $electronic_gadget_store_about_id = wp_insert_post($electronic_gadget_store_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($electronic_gadget_store_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'electronic-gadget-store'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $electronic_gadget_store_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $electronic_gadget_store_services_title = 'Services';
    $electronic_gadget_store_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $electronic_gadget_store_services = array(
        'post_type' => 'page',
        'post_title' => $electronic_gadget_store_services_title,
        'post_content' => $electronic_gadget_store_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $electronic_gadget_store_services_id = wp_insert_post($electronic_gadget_store_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($electronic_gadget_store_menu_id, 0, array(
        'menu-item-title' => __('Services', 'electronic-gadget-store'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $electronic_gadget_store_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $electronic_gadget_store_pages_title = 'Pages';
    $electronic_gadget_store_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $electronic_gadget_store_pages = array(
        'post_type' => 'page',
        'post_title' => $electronic_gadget_store_pages_title,
        'post_content' => $electronic_gadget_store_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $electronic_gadget_store_pages_id = wp_insert_post($electronic_gadget_store_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($electronic_gadget_store_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'electronic-gadget-store'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $electronic_gadget_store_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $electronic_gadget_store_contact_title = 'Contact';
    $electronic_gadget_store_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $electronic_gadget_store_contact = array(
        'post_type' => 'page',
        'post_title' => $electronic_gadget_store_contact_title,
        'post_content' => $electronic_gadget_store_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $electronic_gadget_store_contact_id = wp_insert_post($electronic_gadget_store_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($electronic_gadget_store_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'electronic-gadget-store'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $electronic_gadget_store_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($electronic_gadget_store_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$electronic_gadget_store_bpmenulocation] = $electronic_gadget_store_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('electronic_gadget_store_currency_switcher', '');
        set_theme_mod('electronic_gadget_store_cart_language_translator', '');
        set_theme_mod('electronic_gadget_store_header_button_first', 'Newsletter');
        set_theme_mod('electronic_gadget_store_header_link_first', '#');
        set_theme_mod('electronic_gadget_store_header_button_sec', 'Track Your Order Text');
        set_theme_mod('electronic_gadget_store_header_link_sec', '#');
        set_theme_mod('electronic_gadget_store_discount_text_top', 'Discount off 25% only for winter collection');
        set_theme_mod('electronic_gadget_store_category_text', 'All Categories');
        set_theme_mod('electronic_gadget_store_product_category_number', '');

        // Banner Section
        set_theme_mod('electronic_gadget_store_about_enable', 'true');

        set_theme_mod('electronic_gadget_store_banner_slider',  get_template_directory_uri().'/assets/images/banner.png' );

        set_theme_mod('electronic_gadget_store_slider_short_heading', 'Up To 50 % Off');
        set_theme_mod('electronic_gadget_store_device_price', '999');

        set_theme_mod('electronic_gadget_store_delivery_price', 'FREE DELIVERY');
        set_theme_mod('electronic_gadget_store_device_warranty', 'BRAND WARRANTY');

        set_theme_mod('electronic_gadget_store_mail_text', 'Mail us now');
        set_theme_mod('electronic_gadget_store_mail', 'support@technopro.com');

        set_theme_mod('electronic_gadget_store_call_text', 'call us now');
        set_theme_mod('electronic_gadget_store_call', '(1800) 123-456-7890');

        set_theme_mod('electronic_gadget_store_abt_heading', 'About The Product');
        set_theme_mod('electronic_gadget_store_tab_heading1', 'High-performanc business laptop');
        set_theme_mod('electronic_gadget_store_tab_heading2', 'Powerful AMp Ryzen processors');
        set_theme_mod('electronic_gadget_store_tab_heading3', 'Stacks of memory, fast storage');
        set_theme_mod('electronic_gadget_store_tab_heading4', 'Strong security options');
        set_theme_mod('electronic_gadget_store_tab_heading5', 'Optional (2560 x 1600) display');

        set_theme_mod('electronic_gadget_store_abt_img', get_template_directory_uri().'/assets/images/banner.png' );
        set_theme_mod('electronic_gadget_store_slider_offer_text', 'New Product 30% Offer Sale Special Customers : Lenovo Miix 320 10.1" Full HD Touch laptop + Tablet');
        set_theme_mod('electronic_gadget_store_product_btn_text1', 'View All');
        set_theme_mod('electronic_gadget_store_product_btn_link1', '#');

        // Create About page and set the featured image
        $electronic_gadget_store_abt_title = 'Smart Lenovo Laptop Hot Deal Products!';
        $electronic_gadget_store_abt_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an';

        $my_post = array(
            'post_title'    => wp_strip_all_tags($electronic_gadget_store_abt_title),
            'post_content'  => $electronic_gadget_store_abt_content,
            'post_status'   => 'publish',
            'post_type'     => 'page',
        );

        // Insert the post into the database
        $post_id = wp_insert_post($my_post);

        if ($post_id) {
            // Set the theme mod for the About page
            set_theme_mod('electronic_gadget_store_slider_page', $post_id);

            // Sideload image and set as the featured image
            $image_url = get_template_directory_uri() . '/assets/images/about-img.png';
            $image_id = media_sideload_image($image_url, $post_id, null, 'id');

            if (!is_wp_error($image_id)) {
                set_post_thumbnail($post_id, $image_id);
            }
        }

        // Best Seller Section
        set_theme_mod('electronic_gadget_store_our_products_heading_section', 'Best Seller');
        set_theme_mod('electronic_gadget_store_product_section_btn_text1', 'View All');
        set_theme_mod('electronic_gadget_store_product_section_btn_link1', '#');
        set_theme_mod('electronic_gadget_store_our_product_product_category', 'productcategory1');

        // Define product category names and product titles
        $electronic_gadget_store_category_names = array('productcategory1');
        $electronic_gadget_store_title_array = array(
            array("Product Title 1", "Product Title 2", "Product Title 3", "Product Title 4"),
        );

        foreach ($electronic_gadget_store_category_names as $electronic_gadget_store_index => $electronic_gadget_store_category_name) {
            // Create or retrieve the product category term ID
            $electronic_gadget_store_term = term_exists($electronic_gadget_store_category_name, 'product_cat');
            if ($electronic_gadget_store_term === 0 || $electronic_gadget_store_term === null) {
                // If the term does not exist, create it
                $electronic_gadget_store_term = wp_insert_term($electronic_gadget_store_category_name, 'product_cat');
            }

            if (is_wp_error($electronic_gadget_store_term)) {
                error_log('Error creating category: ' . $electronic_gadget_store_term->get_error_message());
                continue; // Skip to the next iteration if category creation fails
            }

            $electronic_gadget_store_term_id = is_array($electronic_gadget_store_term) ? $electronic_gadget_store_term['term_id'] : $electronic_gadget_store_term;

            // Loop to create 4 products for each category
            for ($electronic_gadget_store_i = 0; $electronic_gadget_store_i < 4; $electronic_gadget_store_i++) {
                // Create product content
                $electronic_gadget_store_title = $electronic_gadget_store_title_array[$electronic_gadget_store_index][$electronic_gadget_store_i];

                // Create product post object
                $electronic_gadget_store_my_post = array(
                    'post_title' => wp_strip_all_tags($electronic_gadget_store_title),
                    'post_status' => 'publish',
                    'post_type' => 'product', // Post type set to 'product'
                );

                // Insert the product into the database
                $electronic_gadget_store_post_id = wp_insert_post($electronic_gadget_store_my_post);

                if (is_wp_error($electronic_gadget_store_post_id)) {
                    error_log('Error creating product: ' . $electronic_gadget_store_post_id->get_error_message());
                    continue; // Skip to the next product if creation fails
                }

                // Assign the category to the product
                wp_set_object_terms($electronic_gadget_store_post_id, (int)$electronic_gadget_store_term_id, 'product_cat');

                // Add product meta (price, etc.)
                update_post_meta($electronic_gadget_store_post_id, '_regular_price', '120'); // Regular price
                update_post_meta($electronic_gadget_store_post_id, '_sale_price', '80'); // Sale price
                update_post_meta($electronic_gadget_store_post_id, '_price', '80'); // Active price

                // Handle the featured image using media_sideload_image
                $electronic_gadget_store_image_url = get_template_directory_uri() . '/assets/images/product' . ($electronic_gadget_store_i + 1) . '.png';
                $electronic_gadget_store_image_id = media_sideload_image($electronic_gadget_store_image_url, $electronic_gadget_store_post_id, null, 'id');

                if (is_wp_error($electronic_gadget_store_image_id)) {
                    error_log('Error downloading image: ' . $electronic_gadget_store_image_id->get_error_message());
                    continue; // Skip to the next product if image download fails
                }

                // Assign featured image to product
                set_post_thumbnail($electronic_gadget_store_post_id, $electronic_gadget_store_image_id);
            }
        }


    }

?>