<?php
/**
 * Electronic Gadget Store: Customizer
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function Electronic_Gadget_Store_Customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Electronic_Gadget_Store_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Electronic_Gadget_Store_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'electronic_gadget_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'electronic-gadget-store' ),
	    'description' => __( 'Description of what this panel does.', 'electronic-gadget-store' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('electronic_gadget_store_tp_general_settings',array(
        'title' => __('TP General Option', 'electronic-gadget-store'),
        'priority' => 1,
        'panel' => 'electronic_gadget_store_panel_id'
    ) );
 	$wp_customize->add_setting('electronic_gadget_store_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_choices'
	));

 	$wp_customize->add_control('electronic_gadget_store_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'electronic-gadget-store'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'electronic-gadget-store'),
		'section' => 'electronic_gadget_store_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','electronic-gadget-store'),
		'Container' => __('Container','electronic-gadget-store'),
		'Container Fluid' => __('Container Fluid','electronic-gadget-store')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('electronic_gadget_store_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'electronic_gadget_store_sanitize_choices'
	));
	$wp_customize->add_control('electronic_gadget_store_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'electronic-gadget-store'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'electronic-gadget-store'),
     'section' => 'electronic_gadget_store_tp_general_settings',
     'choices' => array(
         'full' => __('Full','electronic-gadget-store'),
         'left' => __('Left','electronic-gadget-store'),
         'right' => __('Right','electronic-gadget-store'),
         'three-column' => __('Three Columns','electronic-gadget-store'),
         'four-column' => __('Four Columns','electronic-gadget-store'),
         'grid' => __('Grid Layout','electronic-gadget-store')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('electronic_gadget_store_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'electronic_gadget_store_sanitize_choices'
	));
	$wp_customize->add_control('electronic_gadget_store_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'electronic-gadget-store'),
        'description'   => __('This option work for single blog page', 'electronic-gadget-store'),
        'section' => 'electronic_gadget_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','electronic-gadget-store'),
            'left' => __('Left','electronic-gadget-store'),
            'right' => __('Right','electronic-gadget-store'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('electronic_gadget_store_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'electronic_gadget_store_sanitize_choices'
	));
	$wp_customize->add_control('electronic_gadget_store_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'electronic-gadget-store'),
     'description'   => __('This option work for pages.', 'electronic-gadget-store'),
     'section' => 'electronic_gadget_store_tp_general_settings',
     'choices' => array(
         'full' => __('Full','electronic-gadget-store'),
         'left' => __('Left','electronic-gadget-store'),
         'right' => __('Right','electronic-gadget-store')
     ),
	) );
	//tp typography option
	$electronic_gadget_store_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('electronic_gadget_store_typography_option',array(
		'title'         => __('TP Typography Option', 'electronic-gadget-store'),
		'priority' => 1,
		'panel' => 'electronic_gadget_store_panel_id'
   	));

   	$wp_customize->add_setting('electronic_gadget_store_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_choices',
	));
	$wp_customize->add_control(	'electronic_gadget_store_heading_font_family', array(
		'section' => 'electronic_gadget_store_typography_option',
		'label'   => __('heading Fonts', 'electronic-gadget-store'),
		'type'    => 'select',
		'choices' => $electronic_gadget_store_font_array,
	));

	$wp_customize->add_setting('electronic_gadget_store_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_choices',
	));
	$wp_customize->add_control(	'electronic_gadget_store_body_font_family', array(
		'section' => 'electronic_gadget_store_typography_option',
		'label'   => __('Body Fonts', 'electronic-gadget-store'),
		'type'    => 'select',
		'choices' => $electronic_gadget_store_font_array,
	));

	//TP Color Option
	$wp_customize->add_section('electronic_gadget_store_color_option',array(
     'title'         => __('TP Color Option', 'electronic-gadget-store'),
     'priority' => 1,
     'panel' => 'electronic_gadget_store_panel_id'
    ) );
    
	$wp_customize->add_setting( 'electronic_gadget_store_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_gadget_store_tp_color_option', array(
			'label'     => __('Theme First Color', 'electronic-gadget-store'),
	    'description' => __('It will change the complete theme color in one click.', 'electronic-gadget-store'),
	    'section' => 'electronic_gadget_store_color_option',
	    'settings' => 'electronic_gadget_store_tp_color_option',
  	)));

	//TP Preloader Option
	$wp_customize->add_section('electronic_gadget_store_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'electronic-gadget-store'),
		'priority' => 1,
		'panel' => 'electronic_gadget_store_panel_id'
	) );
	$wp_customize->add_setting( 'electronic_gadget_store_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'electronic_gadget_store_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_gadget_store_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'electronic-gadget-store'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'electronic-gadget-store'),
	    'section' => 'electronic_gadget_store_prelaoder_option',
	    'settings' => 'electronic_gadget_store_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'electronic_gadget_store_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_gadget_store_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'electronic-gadget-store'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'electronic-gadget-store'),
	    'section' => 'electronic_gadget_store_prelaoder_option',
	    'settings' => 'electronic_gadget_store_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'electronic_gadget_store_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_gadget_store_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'electronic-gadget-store'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'electronic-gadget-store'),
	    'section' => 'electronic_gadget_store_prelaoder_option',
	    'settings' => 'electronic_gadget_store_tp_preloader_bg_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('electronic_gadget_store_blog_option',array(
		'title' => __('TP Blog Option', 'electronic-gadget-store'),
		'priority' => 1,
		'panel' => 'electronic_gadget_store_panel_id'
	) );

	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'electronic_gadget_store_sanitize_sortable',
    ));
    $wp_customize->add_control(new Electronic_Gadget_Store_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'electronic-gadget-store'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'electronic-gadget-store') ,
        'section' => 'electronic_gadget_store_blog_option',
        'choices' => array(
            'date' => __('date', 'electronic-gadget-store') ,
            'author' => __('author', 'electronic-gadget-store') ,
            'comment' => __('comment', 'electronic-gadget-store') ,
            'category' => __('category', 'electronic-gadget-store') ,
        ) ,
    )));

    $wp_customize->add_setting( 'electronic_gadget_store_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'electronic_gadget_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'electronic_gadget_store_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('electronic_gadget_store_read_more_text',array(
		'default'=> __('Read More','electronic-gadget-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_read_more_text',array(
		'label'	=> __('Edit Button Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'electronic_gadget_store_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_remove_read_button',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'electronic_gadget_store_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'Electronic_Gadget_Store_Customize_partial_electronic_gadget_store_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'electronic_gadget_store_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'electronic_gadget_store_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'Electronic_Gadget_Store_Customize_partial_electronic_gadget_store_remove_tags',
	));
	$wp_customize->add_setting( 'electronic_gadget_store_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'electronic_gadget_store_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'Electronic_Gadget_Store_Customize_partial_electronic_gadget_store_remove_category',
	));
	$wp_customize->add_setting( 'electronic_gadget_store_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'electronic-gadget-store' ),
	 'section'     => 'electronic_gadget_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'electronic_gadget_store_remove_comment',
	) ) );

	$wp_customize->add_setting( 'electronic_gadget_store_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'electronic-gadget-store' ),
	 'section'     => 'electronic_gadget_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'electronic_gadget_store_remove_related_post',
	) ) );
	$wp_customize->add_setting( 'electronic_gadget_store_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'electronic_gadget_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'electronic_gadget_store_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'electronic_gadget_store_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'electronic-gadget-store' ),
    	'priority' => 2,
		'panel' => 'electronic_gadget_store_panel_id'
	) );
	$wp_customize->add_setting('electronic_gadget_store_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_choices',
	));
	$wp_customize->add_control(	'electronic_gadget_store_menu_font_family', array(
		'section' => 'electronic_gadget_store_menu_typography',
		'label'   => __('Menu Fonts', 'electronic-gadget-store'),
		'type'    => 'select',
		'choices' => $electronic_gadget_store_font_array,
	));

	$wp_customize->add_setting('electronic_gadget_store_menu_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_choices'
 	));
 	$wp_customize->add_control('electronic_gadget_store_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','electronic-gadget-store'),
		'section' => 'electronic_gadget_store_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','electronic-gadget-store'),
		   'Lowercase' => __('Lowercase','electronic-gadget-store'),
		   'Capitalize' => __('Capitalize','electronic-gadget-store'),
		),
	) );
	
	$wp_customize->add_setting('electronic_gadget_store_menu_font_size', array(
	  'default' => '',
      'sanitize_callback' => 'electronic_gadget_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Electronic_Gadget_Store_Range_Slider($wp_customize, 'electronic_gadget_store_menu_font_size', array(
       'section' => 'electronic_gadget_store_menu_typography',
      'label' => esc_html__('Font Size', 'electronic-gadget-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	// Top bar Section
	$wp_customize->add_section( 'electronic_gadget_store_topbar', array(
    	'title'      => __( 'Header Details', 'electronic-gadget-store' ),
    	'description' => __( 'Add your contact details', 'electronic-gadget-store' ),
		'panel' => 'electronic_gadget_store_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting( 'electronic_gadget_store_currency_switcher', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_currency_switcher', array(
		'label'       => esc_html__( 'Show / Hide Currency Switcher', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_currency_switcher',
	) ) );

	$wp_customize->add_setting( 'electronic_gadget_store_cart_language_translator', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_cart_language_translator', array(
		'label'       => esc_html__( 'Show / Hide Language Translator', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_cart_language_translator',
	) ) );

	$wp_customize->add_setting('electronic_gadget_store_header_button_first',array(
		'default'=> 'Newsletter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_header_button_first',array(
		'label'	=> __('Newsletter Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_header_link_first',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_gadget_store_header_link_first',array(
		'label'	=> __('Newsletter Link','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('electronic_gadget_store_header_button_sec',array(
		'default'=> 'Track Your Order Text',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_header_button_sec',array(
		'label'	=> __('Newsletter Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_header_link_sec',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_gadget_store_header_link_sec',array(
		'label'	=> __('Track Your Order Link','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('electronic_gadget_store_discount_text_top',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_discount_text_top',array(
		'label'	=> __('Add Discount Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_category_text',array(
		'default' => 'All Categories',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'electronic_gadget_store_category_text', array(
	   'settings' => 'electronic_gadget_store_category_text',
	   'section'   => 'electronic_gadget_store_topbar',
	   'label' => __('Add Category Text', 'electronic-gadget-store'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_product_category_number',array(
		'default' => '',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_number_absint',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'electronic_gadget_store_product_category_number', array(
	   'settings' => 'electronic_gadget_store_product_category_number',
	   'section'   => 'electronic_gadget_store_topbar',
	   'label' => __('Add Category Limit', 'electronic-gadget-store'),
	   'type'      => 'number'
	));

	//home page slider
	$wp_customize->add_section( 'electronic_gadget_store_slider_section' , array(
    	'title'      => __( 'Banner Section', 'electronic-gadget-store' ),
    	'priority' => 2,
		'panel' => 'electronic_gadget_store_panel_id'
	) );

	$wp_customize->add_setting( 'electronic_gadget_store_slider_arrows', array(
		'default'           => 'true',
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Banner', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_slider_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_slider_arrows',
	) ) );

	$wp_customize->add_setting( 'electronic_gadget_store_slider_page', array(
		'default'           => '',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'electronic_gadget_store_slider_page', array(
		'label'    => __( 'Select Banner Page', 'electronic-gadget-store' ),
		'section'  => 'electronic_gadget_store_slider_section',
		'type'     => 'dropdown-pages'
	) );
	
	$wp_customize->add_setting('electronic_gadget_store_banner_slider', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'electronic_gadget_store_banner_slider', array(
	    'label'   => __('Add Banner Image', 'electronic-gadget-store'),
	    'section' => 'electronic_gadget_store_slider_section',
	)));
	
	$wp_customize->add_setting('electronic_gadget_store_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_slider_short_heading',array(
		'label'	=> __('Add Banner short Heading','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_device_price',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_device_price',array(
		'label'	=> __('Add Product Price','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_delivery_price',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_delivery_price',array(
		'label'	=> __('Add Delivery Price','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_device_warranty',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_device_warranty',array(
		'label'	=> __('Add Product Warranty','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_mail_text',array(
		'label'	=> __('Add Mail Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting('electronic_gadget_store_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('electronic_gadget_store_mail',array(
		'label'	=> __('Add Mail Address','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_call_text',array(
		'label'	=> __('Add Phone Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_phone_number'
	));
	$wp_customize->add_control('electronic_gadget_store_call',array(
		'label'	=> __('Add Phone Number','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_abt_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_abt_heading',array(
		'label'	=> __('Add About Heading','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	for($electronic_gadget_store_i=1;$electronic_gadget_store_i<=5;$electronic_gadget_store_i++) {

	    $wp_customize->add_setting('electronic_gadget_store_tab_heading'.$electronic_gadget_store_i,array(
	        'default'=> '',
	        'sanitize_callback' => 'sanitize_text_field'
	    ));
	    $wp_customize->add_control('electronic_gadget_store_tab_heading'.$electronic_gadget_store_i,array(
	        'label' => __('Add Product Features ','electronic-gadget-store').$electronic_gadget_store_i,
	        'section'=> 'electronic_gadget_store_slider_section',
	        'setting'=> 'electronic_gadget_store_tab_heading'.$electronic_gadget_store_i,
	        'type'=> 'text'
	    ));
  	}

	$wp_customize->add_setting('electronic_gadget_store_abt_img', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'electronic_gadget_store_abt_img', array(
	    'label'   => __('Add About Image', 'electronic-gadget-store'),
	    'section' => 'electronic_gadget_store_slider_section',
	)));

  	$wp_customize->add_setting('electronic_gadget_store_slider_offer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_slider_offer_text',array(
		'label'	=> __('Add Offer Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_product_btn_text1',array(
		'default'=> 'View Collection',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_product_btn_text1',array(
		'label'	=> esc_html__('Add View Collection Button Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_product_btn_link1',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_gadget_store_product_btn_link1',array(
		'label'	=> esc_html__('Add View Collection Button link','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_slider_section',
		'type'=> 'url'
	));

	/*=========================================
	product Section
	=========================================*/
	$wp_customize->add_section(
		'electronic_gadget_store_our_products_section', array(
			'title' => esc_html__( 'Our Products Section', 'electronic-gadget-store' ),
			'priority' => 4,
			'panel' => 'electronic_gadget_store_panel_id',
		)
	);

	$wp_customize->add_setting( 'electronic_gadget_store_our_products_show_hide_section', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_our_products_show_hide_section', array(
		'label'       => esc_html__( 'Show / Hide Section', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_our_products_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_our_products_show_hide_section',
	) ) );

	// About Heading
	$wp_customize->add_setting( 
    	'electronic_gadget_store_our_products_heading_section',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	

	$wp_customize->add_control( 
		'electronic_gadget_store_our_products_heading_section',
		array(
		    'label'   		=> __('Add Heading','electronic-gadget-store'),
		    'section'		=> 'electronic_gadget_store_our_products_section',
			'type' 			=> 'text',
		)
	);

	$electronic_gadget_store_args = array(
	    'type'           => 'product',
	    'child_of'       => 0,
	    'parent'         => '',
	    'orderby'        => 'term_group',
	    'order'          => 'ASC',
	    'hide_empty'     => false,
	    'hierarchical'   => 1,
	    'number'         => '',
	    'taxonomy'       => 'product_cat',
	    'pad_counts'     => false
	);
	$categories = get_categories($electronic_gadget_store_args);
	$electronic_gadget_store_cats = array();
	$i = 0;
	foreach ($categories as $category) {
	    if ($i == 0) {
	        $default = $category->slug;
	        $i++;
	    }
	    $electronic_gadget_store_cats[$category->slug] = $category->name;
	}

	// Set the default value to "none"
	$electronic_gadget_store_default_value = 'none';

	$wp_customize->add_setting(
	    'electronic_gadget_store_our_product_product_category',
	    array(
	        'default'           => $electronic_gadget_store_default_value,
	        'sanitize_callback' => 'electronic_gadget_store_sanitize_select',
	    )
	);

	// Add "None" as an option in the select dropdown
	$electronic_gadget_store_cats_with_none = array_merge(array('none' => 'None'), $electronic_gadget_store_cats);

	$wp_customize->add_control(
	    'electronic_gadget_store_our_product_product_category',
	    array(
	        'type'    => 'select',
	        'choices' => $electronic_gadget_store_cats_with_none,
	        'label'   => __('Select Product Category', 'electronic-gadget-store'),
	        'section' => 'electronic_gadget_store_our_products_section',
	    )
	);

	$wp_customize->add_setting('electronic_gadget_store_product_section_btn_text1',array(
		'default'=> 'View All',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_product_section_btn_text1',array(
		'label'	=> esc_html__('Add Button Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_our_products_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('electronic_gadget_store_product_section_btn_link1',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_gadget_store_product_section_btn_link1',array(
		'label'	=> esc_html__('Add Button link','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_our_products_section',
		'type'=> 'url'
	));

	//footer
	$wp_customize->add_section('electronic_gadget_store_footer_section',array(
		'title'	=> __('Footer Text','electronic-gadget-store'),
		'description'	=> __('Add copyright text.','electronic-gadget-store'),
		'panel' => 'electronic_gadget_store_panel_id',
		'priority' => 7,
	));
	$wp_customize->add_setting('electronic_gadget_store_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_footer_text',array(
		'label'	=> __('Copyright Text','electronic-gadget-store'),
		'section'	=> 'electronic_gadget_store_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('electronic_gadget_store_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_gadget_store_footer_columns',array(
		'label'	=> __('Footer Widget Columns','electronic-gadget-store'),
		'section'	=> 'electronic_gadget_store_footer_section',
		'setting'	=> 'electronic_gadget_store_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'electronic_gadget_store_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_gadget_store_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'electronic-gadget-store'),
			'description' => __('It will change the complete footer widget backgorund color.', 'electronic-gadget-store'),
			'section' => 'electronic_gadget_store_footer_section',
			'settings' => 'electronic_gadget_store_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('electronic_gadget_store_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'electronic_gadget_store_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','electronic-gadget-store'),
         'section' => 'electronic_gadget_store_footer_section'
	)));
	$wp_customize->add_setting( 'electronic_gadget_store_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_footer_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_return_to_header',
	) ) );
    $wp_customize->add_setting('electronic_gadget_store_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Gadget_Store_Icon_Changer(
	        $wp_customize,'electronic_gadget_store_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','electronic-gadget-store'),
		'transport' => 'refresh',
		'section'	=> 'electronic_gadget_store_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('electronic_gadget_store_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'electronic_gadget_store_sanitize_choices'
	));
	$wp_customize->add_control('electronic_gadget_store_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'electronic-gadget-store'),
        'description'   => __('This option work for scroll to top', 'electronic-gadget-store'),
       'section' => 'electronic_gadget_store_footer_section',
       'choices' => array(
            'Right' => __('Right','electronic-gadget-store'),
            'Left' => __('Left','electronic-gadget-store'),
            'Center' => __('Center','electronic-gadget-store')
     ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'Electronic_Gadget_Store_Customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'Electronic_Gadget_Store_Customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('electronic_gadget_store_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'electronic-gadget-store'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'electronic-gadget-store'),
		'priority' => 8,
		'panel' => 'electronic_gadget_store_panel_id'
	) );
	$wp_customize->add_setting( 'electronic_gadget_store_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'electronic_gadget_store_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'electronic-gadget-store' ),
		'section'     => 'electronic_gadget_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_related_post_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'electronic_gadget_store_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'electronic-gadget-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_site_title',
	) ) );
	$wp_customize->add_setting('electronic_gadget_store_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_gadget_store_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','electronic-gadget-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'electronic_gadget_store_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));
	$wp_customize->add_setting( 'electronic_gadget_store_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'electronic-gadget-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('electronic_gadget_store_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_gadget_store_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','electronic-gadget-store'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'electronic_gadget_store_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
    $wp_customize->add_setting('electronic_gadget_store_logo_width',array(
		'default' => 50,
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_gadget_store_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','electronic-gadget-store'),
		'section'	=> 'title_tagline',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 150,
		),
	));

	//Woo Coomerce
	$wp_customize->add_setting('electronic_gadget_store_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_gadget_store_per_columns',array(
		'label'	=> __('Product Per Row','electronic-gadget-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('electronic_gadget_store_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'electronic_gadget_store_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_gadget_store_product_per_page',array(
		'label'	=> __('Product Per Page','electronic-gadget-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'electronic_gadget_store_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'electronic-gadget-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'electronic_gadget_store_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'electronic-gadget-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'electronic_gadget_store_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_gadget_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Gadget_Store_Toggle_Control( $wp_customize, 'electronic_gadget_store_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'electronic-gadget-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'electronic_gadget_store_related_product',
	) ) );
	// 404 PAGE
	$wp_customize->add_section('electronic_gadget_store_404_page_section',array(
		'title'         => __('404 Page', 'electronic-gadget-store'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('electronic_gadget_store_not_found_title',array(
		'default'=> __('Oops! That page cant be found.','electronic-gadget-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('electronic_gadget_store_not_found_title',array(
		'label'	=> __('Edit Title','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_404_page_section',
		'type'=> 'text',
	));
	$wp_customize->add_setting('electronic_gadget_store_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','electronic-gadget-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_gadget_store_not_found_text',array(
		'label'	=> __('Edit Text','electronic-gadget-store'),
		'section'=> 'electronic_gadget_store_404_page_section',
		'type'=> 'text'
	));

}
add_action( 'customize_register', 'Electronic_Gadget_Store_Customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Electronic Gadget Store 1.0
 * @see Electronic_Gadget_Store_Customize_register()
 *
 * @return void
 */
function Electronic_Gadget_Store_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Electronic Gadget Store 1.0
 * @see Electronic_Gadget_Store_Customize_register()
 *
 * @return void
 */
function Electronic_Gadget_Store_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ELECTRONIC_GADGET_STORE_PRO_THEME_NAME' ) ) {
	define( 'ELECTRONIC_GADGET_STORE_PRO_THEME_NAME', esc_html__( 'Electronic Store Pro', 'electronic-gadget-store' ));
}
if ( ! defined( 'ELECTRONIC_GADGET_STORE_PRO_THEME_URL' ) ) {
	define( 'ELECTRONIC_GADGET_STORE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/electronic-store-wordpress-theme'));
}

if ( ! defined( 'electronic_gadget_store_DEMO_TITLE' ) ) {
	define( 'electronic_gadget_store_DEMO_TITLE', esc_html__( 'Click to View Site', 'electronic-gadget-store' ));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Electronic_Gadget_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Electronic_Gadget_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Electronic_Gadget_Store_Customize_Section_Pro(
				$manager,
				'electronic_gadget_store_section_pro',
				array(
					'priority'   => 9,
					'title'    => ELECTRONIC_GADGET_STORE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'electronic-gadget-store' ),
					'pro_url'  => esc_url( ELECTRONIC_GADGET_STORE_PRO_THEME_URL, 'electronic-gadget-store' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new electronic_gadget_store_Customize_Section_Pro(
				$manager,
				'electronic_gadget_store_section_pro_demo',
				array(
					'priority'   => 9,
					'title'    => electronic_gadget_store_DEMO_TITLE,
					'pro_text' => esc_html__( 'View Site', 'electronic-gadget-store' ),
					'pro_url'  => esc_url( home_url() ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'electronic-gadget-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'electronic-gadget-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Electronic_Gadget_Store_Customize::get_instance();